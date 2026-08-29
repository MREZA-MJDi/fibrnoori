<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class SmsService
{
    public function sendOtp(
        string $mobile,
        string $code
    ): void {
        $this->send(
            $mobile,
            "کد ورود شما: {$code}"
        );
    }

    public function send(
        string $mobile,
        string $message
    ): void {
        Log::info('SMS sent', [
            'mobile' => $mobile,
            'message' => $message,
        ]);
    }

    public function sendToSecretary(
        string $message
    ): void {
        Log::info('SMS to secretary', [
            'mobile' => config('services.sms.secretary_mobile'),
            'message' => $message,
        ]);
    }
}
