<?php

namespace App\Services;

use App\Events\FiberRequestCreated;
use App\Models\FiberRequest;
use App\Models\Modem;
use App\Models\Tariff;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

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
             * Modem logic:
             *
             * has_modem = true
             * -> customer already has a modem
             * -> no modem will be assigned
             *
             * has_modem = false
             * -> assign first active modem with stock
             */
            $modem = null;

            $hasModem = filter_var(
                $data['has_modem'] ?? false,
                FILTER_VALIDATE_BOOLEAN
            );

            if (!$hasModem) {

                $modem = Modem::query()
                    ->where('is_active', true)
                    ->where('stock', '>', 0)
                    ->orderBy('sort_order')
                    ->lockForUpdate()
                    ->first();

                if (!$modem) {
                    throw ValidationException::withMessages([
                        'has_modem' =>
                            'در حال حاضر مودم موجود نیست. لطفاً گزینه «مودم دارم» را انتخاب کنید یا بعداً دوباره تلاش کنید.',
                    ]);
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

                // Customer identity
                'full_name' => $data['full_name'],
                'father_name' => $data['father_name'],
                'national_code' => $data['national_code'],
                'birth_certificate_number' => $data['birth_certificate_number'],
                'birth_date' => $data['birth_date'],

                // Contact
                'mobile' => $data['mobile'],
                'landline' => $data['landline'] ?? null,

                // Address
                'province' => $data['province'],
                'city' => $data['city'],
                'address' => $data['address'],
                'postal_code' => $data['postal_code'],

                // Price snapshot
                'tariff_price' => $tariffPrice,
                'modem_price' => $modemPrice,
                'total_price' => $totalPrice,

                // Status
                'status' => 'pending',

                'admin_note' => null,
                'customer_note' => $data['customer_note'] ?? null,

                'reviewed_at' => null,
                'completed_at' => null,
            ]);


            /*
             * Decrease modem stock only when a modem
             * has actually been assigned.
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
         * Dispatch only after the transaction succeeds.
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