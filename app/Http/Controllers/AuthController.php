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

        return redirect()
            ->route('auth.verify')
            ->with([
                'success' => 'کد تایید ارسال شد.',
                'mobile' => $mobile,
            ]);
    }

    public function showVerify(): View|RedirectResponse
    {
        $mobile = session('mobile');

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
        $mobile = $request->validated('mobile');
        $code = $request->validated('code');

        $this->otpService->verify(
            $mobile,
            $code
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

        $intended = session()->pull(
            'url.intended',
            route('account.dashboard')
        );

        return redirect($intended)
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
