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

    public function __construct(
        protected SmsService $smsService
    ) {
    }

    /**
     * Generate and send OTP.
     */
    public function send(
        string $mobile,
        ?string $requestIp = null
    ): OtpCode {
        $otp = DB::transaction(function () use (
            $mobile,
            $requestIp
        ) {

            /*
             * Invalidate previous active codes.
             */
            OtpCode::query()
                ->where('mobile', $mobile)
                ->whereNull('verified_at')
                ->update([
                    'verified_at' => now(),
                ]);


            /*
             * Generate new code.
             */
            $code = $this->generateCode();


            /*
             * Store OTP.
             */
            return OtpCode::create([
                'mobile' => $mobile,

                'code' => $code,

                'expires_at' => now()->addMinutes(
                    $this->otpLifetimeMinutes
                ),

                'attempts' => 0,

                'verified_at' => null,

                'request_ip' => $requestIp,
            ]);
        });


        /*
         * Send SMS only after the OTP has been
         * successfully stored in the database.
         */
        $this->smsService->sendOtp(
            $otp->mobile,
            $otp->code
        );


        return $otp;
    }


    /**
     * Verify OTP code.
     */
    public function verify(
        string $mobile,
        string $code
    ): OtpCode {
        $otp = OtpCode::query()
            ->where('mobile', $mobile)
            ->whereNull('verified_at')
            ->latest('id')
            ->first();


        if (!$otp) {
            throw ValidationException::withMessages([
                'code' => 'کد تأییدی برای این شماره پیدا نشد.',
            ]);
        }


        if ($otp->isExpired()) {
            throw ValidationException::withMessages([
                'code' => 'کد تأیید منقضی شده است.',
            ]);
        }


        if ($otp->attempts >= $this->maxAttempts) {
            throw ValidationException::withMessages([
                'code' => 'تعداد تلاش‌های مجاز به پایان رسیده است.',
            ]);
        }


        /*
         * Wrong code.
         */
        if (!hash_equals(
            (string) $otp->code,
            (string) $code
        )) {
            $otp->increment('attempts');

            throw ValidationException::withMessages([
                'code' => 'کد تأیید اشتباه است.',
            ]);
        }


        /*
         * Successful verification.
         */
        $otp->update([
            'verified_at' => now(),
        ]);


        return $otp->fresh();
    }


    /**
     * Generate numeric OTP.
     */
    private function generateCode(): string
    {
        return str_pad(
            (string) random_int(
                0,
                999999
            ),
            $this->otpLength,
            '0',
            STR_PAD_LEFT
        );
    }
}
