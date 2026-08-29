<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\SendOtpRequest;
use App\Http\Requests\Auth\VerifyOtpRequest;
use App\Models\User;
use App\Services\OtpService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function __construct(
        protected OtpService $otpService
    ) {
    }

    public function showLogin(): View
    {
        return view('auth.login');
    }

    public function sendOtp(
        SendOtpRequest $request
    ): RedirectResponse {
        $mobile = $request->validated('mobile');

        $this->otpService->send(
            $mobile,
            $request->ip()
        );

        session()->put([
            'auth.otp.mobile' => $mobile,
            'auth.otp.requested_at' => now()->timestamp,
        ]);

        return redirect()
            ->route('auth.verify')
            ->with(
                'success',
                'کد تأیید با موفقیت ارسال شد.'
            );
    }

    public function showVerify(): View|RedirectResponse
    {
        $mobile = session('auth.otp.mobile');

        if (!$mobile) {
            return redirect()
                ->route('auth.login')
                ->with(
                    'error',
                    'ابتدا شماره موبایل خود را وارد کنید.'
                );
        }

        return view(
            'auth.otp',
            compact('mobile')
        );
    }

    public function verifyOtp(
        VerifyOtpRequest $request
    ): RedirectResponse {
        $mobile = session('auth.otp.mobile');

        if (!$mobile) {
            return redirect()
                ->route('auth.login')
                ->with(
                    'error',
                    'فرآیند تأیید منقضی شده است. دوباره درخواست کد کنید.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Never trust the mobile number sent by the browser.
        |--------------------------------------------------------------------------
        */

        $this->otpService->verify(
            $mobile,
            $request->validated('code')
        );

        $user = User::firstOrCreate(
            [
                'mobile' => $mobile,
            ],
            [
                'name' => null,
                'role' => 'customer',
                'mobile_verified_at' => now(),
            ]
        );

        if (!$user->mobile_verified_at) {
            $user->forceFill([
                'mobile_verified_at' => now(),
            ])->save();
        }

        Auth::login($user);

        request()
            ->session()
            ->regenerate();

        /*
        |--------------------------------------------------------------------------
        | Clear temporary OTP session data after successful login.
        |--------------------------------------------------------------------------
        */

        session()->forget([
            'auth.otp.mobile',
            'auth.otp.requested_at',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Role based destination
        |--------------------------------------------------------------------------
        */

        $intended = session()->pull('url.intended');

        if ($intended) {
            return redirect($intended)
                ->with(
                    'success',
                    'با موفقیت وارد حساب کاربری شدید.'
                );
        }

        if ($user->isAdmin()) {
            return redirect()
                ->route('admin.dashboard')
                ->with(
                    'success',
                    'با موفقیت وارد پنل مدیریت شدید.'
                );
        }

        return redirect()
            ->route('account.dashboard')
            ->with(
                'success',
                'با موفقیت وارد حساب کاربری شدید.'
            );
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        request()
            ->session()
            ->invalidate();

        request()
            ->session()
            ->regenerateToken();

        return redirect()
            ->route('home')
            ->with(
                'success',
                'با موفقیت از حساب خارج شدید.'
            );
    }


}
