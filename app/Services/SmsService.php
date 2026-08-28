<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class SmsService
{
    public function sendToSecretary(string $message): void
    {
        Log::info('SMS to secretary', [
            'message' => $message,
        ]);
    }

    public function send(string $mobile, string $message): void
    {
        Log::info('SMS sent', [
            'mobile' => $mobile,
            'message' => $message,
        ]);
    }
}

