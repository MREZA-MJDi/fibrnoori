<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use RuntimeException;

class SmsService
{
    /**
     * Send OTP SMS using BehinPayam GET API.
     */
    public function sendOtp(
        string $mobile,
        string $code
    ): void {
        $this->send(
            $mobile,
            "کد ورود شما: {$code}"
        );
    }

    /**
     * Send a normal SMS.
     */
    public function send(
        string $mobile,
        string $message
    ): void {
        $apiKey = (string) config('services.behinpayam.api_key');
        $url = (string) config('services.behinpayam.url');
        $sender = (string) config('services.behinpayam.sender');

        if ($apiKey === '') {
            throw new RuntimeException(
                'BehinPayam API Key is not configured.'
            );
        }

        if ($url === '') {
            throw new RuntimeException(
                'BehinPayam API URL is not configured.'
            );
        }

        if ($sender === '') {
            throw new RuntimeException(
                'BehinPayam sender is not configured.'
            );
        }

        $recipient = $this->normalizeMobile($mobile);

        try {
            $response = Http::timeout(15)
                ->acceptJson()
                ->get($url, [
                    'ApiKey' => $apiKey,
                    'Text' => $message,
                    'Sender' => $sender,
                    'Recipients' => $recipient,
                ]);
        } catch (\Throwable $e) {
            Log::error('BehinPayam connection error', [
                'mobile' => $mobile,
                'error' => $e->getMessage(),
            ]);

            throw new RuntimeException(
                'خطا در ارتباط با سرویس پیامک.'
            );
        }

        if ($response->failed()) {
            Log::error('BehinPayam HTTP error', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            throw new RuntimeException(
                'خطا در ارسال پیامک.'
            );
        }

        $data = $response->json();

        if (!is_array($data)) {
            Log::error('BehinPayam invalid response', [
                'body' => $response->body(),
            ]);

            throw new RuntimeException(
                'پاسخ نامعتبر از سرویس پیامک دریافت شد.'
            );
        }

        /*
         * According to the API documentation,
         * a successful response contains Result.
         */
        if (!isset($data['Result'])) {
            Log::error('BehinPayam SMS failed', [
                'response' => $data,
            ]);

            throw new RuntimeException(
                'ارسال پیامک ناموفق بود.'
            );
        }

        Log::info('BehinPayam SMS sent', [
            'mobile' => $mobile,
            'result' => $data['Result'],
        ]);
    }

    /**
     * Send SMS to secretary.
     */
    public function sendToSecretary(
        string $message
    ): void {
        $mobile = config('services.sms.secretary_mobile');

        if (!$mobile) {
            Log::warning('Secretary mobile is not configured.');

            return;
        }

        $this->send(
            $mobile,
            $message
        );
    }

    /**
     * Normalize Iranian mobile number.
     *
     * 0912... -> 98912...
     */
    private function normalizeMobile(string $mobile): string
    {
        $mobile = preg_replace('/\D+/', '', $mobile) ?? '';

        if (str_starts_with($mobile, '09')) {
            return '98' . substr($mobile, 1);
        }

        return $mobile;
    }
}

