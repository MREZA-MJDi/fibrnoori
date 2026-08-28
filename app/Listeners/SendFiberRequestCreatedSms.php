<?php

namespace App\Listeners;

use App\Events\FiberRequestCreated;
use App\Services\SmsService;

class SendFiberRequestCreatedSms
{
    public function __construct(
        protected SmsService $smsService
    ) {
    }

    public function handle(FiberRequestCreated $event): void
    {
        $fiberRequest = $event->fiberRequest;

        $message = sprintf(
            "درخواست جدید فیبر نوری\nکد پیگیری: %s\nنام: %s\nموبایل: %s",
            $fiberRequest->tracking_code,
            $fiberRequest->full_name,
            $fiberRequest->mobile
        );

        $this->smsService->sendToSecretary($message);
    }
}
