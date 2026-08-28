<?php

namespace App\Services;

use App\Models\OtpCode;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class OtpService
{
    private int $otpLength = 6;

    private int $otpLifetimeMinutes = 2;

    private int $maxAttempts = 5;

    public function send(string $mobile, ?string $requestIp = null): OtpCode
    {
        return DB::transaction(function () use ($mobile, $requestIp) {

            OtpCode::where('mobile', $mobile)
                ->whereNull('verified_at')
                ->update([
                    'verified_at' => now(),
                ]);

            $code = $this->generateCode();

            return OtpCode::create([
                'mobile' => $mobile,
                'code' => $code,
                'expires_at' => now()->addMinutes($this->otpLifetimeMinutes),
                'attempts' => 0,
                'request_ip' => $requestIp,
            ]);
        });
    }

    public function verify(string $mobile, string $code): OtpCode
    {
        $otp = OtpCode::where('mobile', $mobile)
            ->whereNull('verified_at')
            ->latest('id')
            ->first();

        if (!$otp) {
            throw ValidationException::withMessages([
                'code' => 'کد تاییدی برای این شماره پیدا نشد.',
            ]);
        }

        if ($otp->isExpired()) {
            throw ValidationException::withMessages([
                'code' => 'کد تایید منقضی شده است.',
            ]);
        }

        if ($otp->attempts >= $this->maxAttempts) {
            throw ValidationException::withMessages([
                'code' => 'تعداد تلاش‌های مجاز به پایان رسیده است.',
            ]);
        }

        if ($otp->code !== $code) {
            $otp->increment('attempts');

            throw ValidationException::withMessages([
                'code' => 'کد تایید اشتباه است.',
            ]);
        }

        $otp->update([
            'verified_at' => now(),
        ]);

        return $otp->fresh();
    }

    private function generateCode(): string
    {
        return str_pad(
            (string) random_int(0, 999999),
            $this->otpLength,
            '0',
            STR_PAD_LEFT
        );
    }
}
