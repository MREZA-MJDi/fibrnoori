<x-layouts.auth>
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md text-center">

            <div class="mb-6">
                <div
                    class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-red-100 text-red-600"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-10 w-10"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 9v3.75m0 3.75h.008M10.29 3.86l-8.82 15a1.5 1.5 0 001.3 2.25h18.46a1.5 1.5 0 001.3-2.25l-8.82-15a1.5 1.5 0 00-2.6 0z"
                        />
                    </svg>
                </div>
            </div>

            <h1 class="text-2xl font-bold text-gray-900">
                دسترسی به این صفحه برای شما امکان‌پذیر نیست
            </h1>

            <p class="mt-3 text-sm leading-7 text-gray-600">
                شما سطح دسترسی لازم برای مشاهده این صفحه را ندارید.
                لطفاً دوباره تلاش کنید.
            </p>

            <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:justify-center">

                @auth
                    <a
                        href="{{ auth()->user()->isAdmin()
                            ? route('admin.dashboard')
                            : route('customer.home') }}"
                        class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-5 py-3 text-sm font-medium text-white transition hover:bg-gray-800"
                    >
                        بازگشت به صفحه اصلی
                    </a>

                    <form
                        method="POST"
                        action="{{ route('auth.logout') }}"
                    >
                        @csrf

                        <button
                            type="submit"
                            class="w-full rounded-lg border border-gray-300 px-5 py-3 text-sm font-medium text-gray-700 transition hover:bg-gray-50 sm:w-auto"
                        >
                            خروج از حساب
                        </button>
                    </form>
                @else
                    <a
                        href="{{ route('auth.login') }}"
                        class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-5 py-3 text-sm font-medium text-white transition hover:bg-gray-800"
                    >
                        ورود / ثبت‌نام
                    </a>
                @endauth

            </div>

        </div>
    </div>
</x-layouts.auth>