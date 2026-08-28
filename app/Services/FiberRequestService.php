<?php

namespace App\Services;

use App\Models\FiberRequest;
use App\Models\Modem;
use App\Models\Tariff;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RuntimeException;

class FiberRequestService
{
    public function create(array $data, int $userId): FiberRequest
    {
        return DB::transaction(function () use ($data, $userId) {

            $tariff = Tariff::query()
                ->where('is_active', true)
                ->findOrFail($data['tariff_id']);

            $modem = null;

            if (!empty($data['modem_id'])) {
                $modem = Modem::query()
                    ->where('is_active', true)
                    ->findOrFail($data['modem_id']);

                if (!$modem->hasStock()) {
                    throw new RuntimeException('مودم انتخاب شده موجود نیست.');
                }
            }

            $tariffPrice = $tariff->price;
            $modemPrice = $modem?->price ?? 0;

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
                'total_price' => $tariffPrice + $modemPrice,

                'status' => 'pending',

                'customer_note' => $data['customer_note'] ?? null,
            ]);

            if ($modem) {
                $modem->decrement('stock');
            }

            return $fiberRequest->load([
                'user',
                'tariff',
                'modem',
            ]);
        });
    }

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
            $oldStatus = $fiberRequest->status;

            if ($oldStatus === $status) {
                return $fiberRequest->fresh([
                    'user',
                    'tariff',
                    'modem',
                    'statusHistories',
                ]);
            }

            $fiberRequest->update([
                'status' => $status,
                'admin_note' => $note ?? $fiberRequest->admin_note,
                'reviewed_at' => $fiberRequest->reviewed_at ?? now(),
                'completed_at' => $status === 'completed'
                    ? now()
                    : $fiberRequest->completed_at,
            ]);

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
                'statusHistories',
            ]);
        });
    }

    private function generateTrackingCode(): string
    {
        do {
            $trackingCode = 'FN-' . now()->format('Ymd') . '-' . strtoupper(
                    Str::random(8)
                );
        } while (
            FiberRequest::where('tracking_code', $trackingCode)->exists()
        );

        return $trackingCode;
    }
}
