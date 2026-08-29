<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use RuntimeException;

class KavenegarSmsService
{
    protected string $apiKey;
    protected ?string $sender;
    protected ?string $otpTemplate;

    public function __construct()
    {
        $this->apiKey = (string) config('services.kavenegar.api_key');
        $this->sender = config('services.kavenegar.sender');
        $this->otpTemplate = config('services.kavenegar.otp_template');

        if ($this->apiKey === '') {
            throw new RuntimeException(
                'Kavenegar API key is not configured.'
            );
        }
    }

    /**
     * Send a normal SMS.
     */
    public function send(
        string $mobile,
        string $message
    ): void {
        $payload = [
            'receptor' => $mobile,
            'message' => $message,
        ];

        if ($this->sender) {
            $payload['sender'] = $this->sender;
        }

        $this->request('sms/send', $payload);
    }

    /**
     * Send OTP using Kavenegar Lookup/Pattern.
     */
    public function sendOtp(
        string $mobile,
        string $code
    ): void {
        if (!$this->otpTemplate) {
            throw new RuntimeException(
                'Kavenegar OTP template is not configured.'
            );
        }

        $this->request('verify/lookup', [
            'receptor' => $mobile,
            'token' => $code,
            'template' => $this->otpTemplate,
        ]);
    }

    /**
     * Send SMS to secretary.
     */
    public function sendToSecretary(
        string $message
    ): void {
        $mobile = config('services.kavenegar.secretary_mobile');

        if (!$mobile) {
            throw new RuntimeException(
                'Secretary mobile is not configured.'
            );
        }

        $this->send($mobile, $message);
    }

    /**
     * Execute Kavenegar API request.
     */
    protected function request(
        string $endpoint,
        array $payload
    ): array {
        $url = sprintf(
            'https://api.kavenegar.com/v1/%s/%s.json',
            $this->apiKey,
            $endpoint
        );

        $response = Http::asForm()
            ->timeout(15)
            ->post($url, $payload);

        if (!$response->successful()) {
            throw new RuntimeException(
                'Kavenegar request failed with HTTP status ' .
                $response->status() .
                '.'
            );
        }

        $json = $response->json();

        if (
            !is_array($json)
            || !isset($json['return'])
            || ($json['return']['status'] ?? 0) != 200
        ) {
            throw new RuntimeException(
                'Kavenegar rejected the SMS request.'
            );
        }

        return $json;
    }
}
