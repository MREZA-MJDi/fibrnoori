<?php

namespace App\Services;

use App\Events\FiberRequestCreated;
use App\Models\FiberRequest;
use App\Models\Modem;
use App\Models\Tariff;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RuntimeException;

class FiberRequestService
{
    /**
     * Create a new fiber request.
     */
    public function create(
        array $data,
        int $userId
    ): FiberRequest {
        $fiberRequest = DB::transaction(function () use ($data, $userId) {

            /*
             * Active tariff.
             */
            $tariff = Tariff::query()
                ->where('is_active', true)
                ->findOrFail($data['tariff_id']);


            /*
             * Optional modem.
             */
            $modem = null;

            if (!empty($data['modem_id'])) {

                $modem = Modem::query()
                    ->where('is_active', true)
                    ->lockForUpdate()
                    ->findOrFail($data['modem_id']);

                if (!$modem->hasStock()) {
                    throw new RuntimeException(
                        'مودم انتخاب‌شده موجود نیست.'
                    );
                }
            }


            /*
             * Price snapshot.
             */
            $tariffPrice = (int) $tariff->price;
            $modemPrice = (int) ($modem?->price ?? 0);

            $totalPrice = $tariffPrice + $modemPrice;


            /*
             * Create request.
             */
            $fiberRequest = FiberRequest::create([
                'user_id' => $userId,

                'tariff_id' => $tariff->id,
                'modem_id' => $modem?->id,

                'tracking_code' => $this->generateTrackingCode(),

                'full_name' => $data['full_name'],
                'national_code' => $data['national_code'],
                'mobile' => $data['mobile'],

                'province' => $data['province'],
                'city' => $data['city'],
                'address' => $data['address'],
                'postal_code' => $data['postal_code'],

                'tariff_price' => $tariffPrice,
                'modem_price' => $modemPrice,
                'total_price' => $totalPrice,

                'status' => 'pending',

                'admin_note' => null,
                'customer_note' => $data['customer_note'] ?? null,

                'reviewed_at' => null,
                'completed_at' => null,
            ]);


            /*
             * Decrease modem stock.
             */
            if ($modem) {
                $modem->decrement('stock');
            }


            /*
             * Load relationships before the event is dispatched.
             */
            return $fiberRequest->load([
                'user',
                'tariff',
                'modem',
            ]);
        });


        /*
         * Dispatch only after the transaction has completed successfully.
         *
         * This prevents SMS from being sent if the database
         * transaction fails or rolls back.
         */
        FiberRequestCreated::dispatch($fiberRequest);


        return $fiberRequest;
    }


    /**
     * Update request status and create an audit history record.
     */
    public function updateStatus(
        FiberRequest $fiberRequest,
        string $status,
        ?string $note = null,
        ?int $changedBy = null,
        ?string $ipAddress = null
    ): FiberRequest {
        return DB::transaction(function () use (
            $fiberRequest,
            $status,
            $note,
            $changedBy,
            $ipAddress
        ) {

            $fiberRequest->refresh();

            $oldStatus = $fiberRequest->status;


            /*
             * Nothing changed.
             */
            if ($oldStatus === $status) {

                if (
                    !is_null($note)
                    && $note !== $fiberRequest->admin_note
                ) {
                    $fiberRequest->update([
                        'admin_note' => $note,
                    ]);
                }

                return $fiberRequest->fresh([
                    'user',
                    'tariff',
                    'modem',
                    'statusHistories.changedBy',
                ]);
            }


            /*
             * reviewed_at
             */
            $reviewedAt = $fiberRequest->reviewed_at;

            if (
                is_null($reviewedAt)
                && in_array(
                    $status,
                    [
                        'reviewing',
                        'approved',
                        'completed',
                        'rejected',
                    ],
                    true
                )
            ) {
                $reviewedAt = now();
            }


            /*
             * completed_at
             */
            $completedAt = $fiberRequest->completed_at;

            if ($status === 'completed') {
                $completedAt ??= now();
            }


            /*
             * Update request.
             */
            $fiberRequest->update([
                'status' => $status,

                'admin_note' => !is_null($note)
                    ? $note
                    : $fiberRequest->admin_note,

                'reviewed_at' => $reviewedAt,

                'completed_at' => $completedAt,
            ]);


            /*
             * Audit history.
             */
            $fiberRequest->statusHistories()->create([
                'changed_by' => $changedBy,

                'from_status' => $oldStatus,

                'to_status' => $status,

                'note' => $note,

                'ip_address' => $ipAddress,
            ]);


            return $fiberRequest->fresh([
                'user',
                'tariff',
                'modem',
                'statusHistories.changedBy',
            ]);
        });
    }


    /**
     * Generate unique tracking code.
     */
    private function generateTrackingCode(): string
    {
        do {
            $trackingCode = sprintf(
                'FN-%s-%s',
                now()->format('Ymd'),
                strtoupper(Str::random(8))
            );
        } while (
            FiberRequest::query()
                ->where('tracking_code', $trackingCode)
                ->exists()
        );

        return $trackingCode;
    }
}
