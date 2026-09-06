<?php

namespace App\Listeners;

use App\Events\FiberRequestCreated;
use App\Services\SmsService;
use Illuminate\Support\Facades\Log;

class SendFiberRequestCreatedSms
{
    public function __construct(
        protected SmsService $smsService
    ) {
    }

    public function handle(FiberRequestCreated $event): void
    {
        $fiberRequest = $event->fiberRequest;

        /*
         * Customer SMS
         */
        try {
            $customerMessage = sprintf(
                "درخواست شما در سیستم ثبت شد.\nکد پیگیری: %s\nلطفاً منتظر بررسی اپراتورهای ما باشید.",
                $fiberRequest->tracking_code
            );

            $this->smsService->send(
                $fiberRequest->mobile,
                $customerMessage
            );
        } catch (\Throwable $e) {
            Log::error('Failed to send fiber request SMS to customer', [
                'fiber_request_id' => $fiberRequest->id,
                'mobile' => $fiberRequest->mobile,
                'error' => $e->getMessage(),
            ]);
        }

        /*
         * Secretary SMS
         */
        try {
            $secretaryMessage = sprintf(
                "درخواست جدید فیبر نوری\nنام: %s\nموبایل: %s\nکد پیگیری: %s",
                $fiberRequest->full_name,
                $fiberRequest->mobile,
                $fiberRequest->tracking_code
            );

            $this->smsService->sendToSecretary(
                $secretaryMessage
            );
        } catch (\Throwable $e) {
            Log::error('Failed to send fiber request SMS to secretary', [
                'fiber_request_id' => $fiberRequest->id,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
