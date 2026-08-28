<x-layouts.admin
    title="جزئیات درخواست | فیبره نوری"
    heading="جزئیات درخواست"
>

    @php
        $status = match ($request->status) {
            'pending' => [
                'label' => 'در انتظار بررسی',
                'class' => 'bg-amber-50 text-amber-700',
            ],
            'reviewing' => [
                'label' => 'در حال بررسی',
                'class' => 'bg-blue-50 text-blue-700',
            ],
            'approved' => [
                'label' => 'تأیید شده',
                'class' => 'bg-indigo-50 text-indigo-700',
            ],
            'completed' => [
                'label' => 'تکمیل شده',
                'class' => 'bg-emerald-50 text-emerald-700',
            ],
            'rejected' => [
                'label' => 'رد شده',
                'class' => 'bg-red-50 text-red-700',
            ],
            default => [
                'label' => $request->status,
                'class' => 'bg-slate-100 text-slate-700',
            ],
        };
    @endphp

    <div class="space-y-6">

        {{-- Header --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

            <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

                <div class="min-w-0">

                    <div class="flex flex-wrap items-center gap-2">

                        <span class="rounded-full px-3 py-1.5 text-xs font-bold {{ $status['class'] }}">
                            {{ $status['label'] }}
                        </span>

                        <span class="text-xs font-medium text-slate-400">
                            درخواست #{{ $request->id }}
                        </span>

                    </div>

                    <h2 class="mt-3 break-all text-xl font-black tracking-tight text-slate-950 sm:text-2xl">
                        {{ $request->tracking_code }}
                    </h2>

                    <p class="mt-2 text-sm text-slate-500">
                        ثبت شده در {{ $request->created_at?->format('Y/m/d - H:i') }}
                    </p>

                </div>

                <a
                    href="{{ url('/admin/requests') }}"
                    class="inline-flex min-h-11 items-center justify-center rounded-xl border border-slate-200 px-5 text-sm font-bold text-slate-700 transition hover:bg-slate-50"
                >
                    بازگشت به درخواست‌ها
                </a>

            </div>

        </section>


        {{-- Customer --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

            <div class="mb-6">

                <h3 class="text-lg font-black text-slate-950">
                    اطلاعات مشتری
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    اطلاعات ثبت‌شده هنگام ایجاد درخواست
                </p>

            </div>

            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">

                <div class="rounded-2xl bg-slate-50 p-4">
                    <p class="text-xs font-bold text-slate-400">
                        نام و نام خانوادگی
                    </p>

                    <p class="mt-2 text-sm font-black text-slate-900">
                        {{ $request->full_name }}
                    </p>
                </div>

                <div class="rounded-2xl bg-slate-50 p-4">
                    <p class="text-xs font-bold text-slate-400">
                        شماره موبایل
                    </p>

                    <p
                        class="mt-2 text-sm font-black text-slate-900"
                        dir="ltr"
                    >
                        {{ $request->mobile }}
                    </p>
                </div>

                <div class="rounded-2xl bg-slate-50 p-4">
                    <p class="text-xs font-bold text-slate-400">
                        کد ملی
                    </p>

                    <p
                        class="mt-2 text-sm font-black text-slate-900"
                        dir="ltr"
                    >
                        {{ $request->national_code }}
                    </p>
                </div>

            </div>

        </section>


        {{-- Address --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

            <div class="mb-6">

                <h3 class="text-lg font-black text-slate-950">
                    آدرس نصب
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    محل درخواست نصب اینترنت فیبر نوری
                </p>

            </div>

            <div class="grid gap-4 sm:grid-cols-2">

                <div class="rounded-2xl bg-slate-50 p-4">

                    <p class="text-xs font-bold text-slate-400">
                        استان
                    </p>

                    <p class="mt-2 text-sm font-black text-slate-900">
                        {{ $request->province }}
                    </p>

                </div>

                <div class="rounded-2xl bg-slate-50 p-4">

                    <p class="text-xs font-bold text-slate-400">
                        شهر
                    </p>

                    <p class="mt-2 text-sm font-black text-slate-900">
                        {{ $request->city }}
                    </p>

                </div>

                <div class="rounded-2xl bg-slate-50 p-4 sm:col-span-2">

                    <p class="text-xs font-bold text-slate-400">
                        آدرس
                    </p>

                    <p class="mt-2 text-sm leading-7 text-slate-800">
                        {{ $request->address }}
                    </p>

                </div>

                <div class="rounded-2xl bg-slate-50 p-4">

                    <p class="text-xs font-bold text-slate-400">
                        کد پستی
                    </p>

                    <p
                        class="mt-2 text-sm font-black text-slate-900"
                        dir="ltr"
                    >
                        {{ $request->postal_code }}
                    </p>

                </div>

            </div>

        </section>


        {{-- Products & Price --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

            <div class="mb-6">

                <h3 class="text-lg font-black text-slate-950">
                    سرویس انتخاب‌شده
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    تعرفه و تجهیزات ثبت‌شده برای این درخواست
                </p>

            </div>

            <div class="grid gap-4 md:grid-cols-2">

                <div class="rounded-2xl border border-slate-200 p-5">

                    <p class="text-xs font-bold text-slate-400">
                        تعرفه
                    </p>

                    <p class="mt-2 text-base font-black text-slate-900">
                        {{ $request->tariff?->name ?? '—' }}
                    </p>

                    <p class="mt-2 text-sm text-slate-500">
                        {{ number_format($request->tariff_price) }}
                        تومان
                    </p>

                    @if ($request->tariff?->speed_mbps)
                        <p class="mt-2 text-xs text-primary-600">
                            سرعت {{ number_format($request->tariff->speed_mbps) }} Mbps
                        </p>
                    @endif

                </div>


                <div class="rounded-2xl border border-slate-200 p-5">

                    <p class="text-xs font-bold text-slate-400">
                        مودم
                    </p>

                    <p class="mt-2 text-base font-black text-slate-900">
                        {{ $request->modem?->name ?? 'بدون مودم' }}
                    </p>

                    <p class="mt-2 text-sm text-slate-500">
                        {{ number_format($request->modem_price) }}
                        تومان
                    </p>

                </div>

            </div>


            <div class="mt-5 rounded-2xl bg-slate-900 p-5 text-white">

                <div class="flex items-center justify-between gap-4">

                    <span class="text-sm font-bold text-slate-300">
                        مبلغ نهایی
                    </span>

                    <span class="text-xl font-black">
                        {{ number_format($request->total_price) }}
                        تومان
                    </span>

                </div>

            </div>

        </section>


        {{-- Notes --}}
        @if ($request->customer_note || $request->admin_note)

            <section class="grid gap-4 md:grid-cols-2">

                @if ($request->customer_note)

                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">

                        <h3 class="text-sm font-black text-slate-900">
                            توضیح مشتری
                        </h3>

                        <p class="mt-3 text-sm leading-7 text-slate-600">
                            {{ $request->customer_note }}
                        </p>

                    </div>

                @endif

                @if ($request->admin_note)

                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">

                        <h3 class="text-sm font-black text-slate-900">
                            یادداشت مدیر
                        </h3>

                        <p class="mt-3 text-sm leading-7 text-slate-600">
                            {{ $request->admin_note }}
                        </p>

                    </div>

                @endif

            </section>

        @endif


        {{-- Status history --}}
        @if ($request->statusHistories?->count())

            <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

                <div class="mb-6">

                    <h3 class="text-lg font-black text-slate-950">
                        تاریخچه وضعیت
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        روند تغییر وضعیت این درخواست
                    </p>

                </div>

                <div class="space-y-4">

                    @foreach ($request->statusHistories as $history)

                        <div class="relative flex gap-4">

                            <div class="relative flex shrink-0 flex-col items-center">

                                <span class="grid size-10 place-items-center rounded-xl bg-slate-100 text-slate-600">

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.8"
                                        stroke="currentColor"
                                        class="size-5"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M12 6v6l4 2"
                                        />

                                        <circle
                                            cx="12"
                                            cy="12"
                                            r="8.5"
                                        />
                                    </svg>

                                </span>

                            </div>

                            <div class="min-w-0 flex-1 rounded-2xl bg-slate-50 p-4">

                                <div class="flex flex-wrap items-center justify-between gap-2">

                                    <p class="text-sm font-black text-slate-900">

                                        @if ($history->from_status)
                                            {{ $history->from_status }}
                                            ←
                                        @endif

                                        {{ $history->to_status }}

                                    </p>

                                    <time
                                        class="text-xs text-slate-400"
                                        datetime="{{ $history->created_at?->toIso8601String() }}"
                                    >
                                        {{ $history->created_at?->format('Y/m/d H:i') }}
                                    </time>

                                </div>

                                @if ($history->note)

                                    <p class="mt-2 text-sm leading-6 text-slate-600">
                                        {{ $history->note }}
                                    </p>

                                @endif

                            </div>

                        </div>

                    @endforeach

                </div>

            </section>

        @endif


        {{-- Admin actions --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

            <div class="mb-6">

                <h3 class="text-lg font-black text-slate-950">
                    مدیریت درخواست
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    وضعیت درخواست را از این بخش تغییر دهید.
                </p>

            </div>

            <form
                method="POST"
                action="{{ url('/admin/requests/' . $request->id . '/status') }}"
                class="space-y-5"
            >

                @csrf
                @method('PATCH')

                <div class="grid gap-5 md:grid-cols-2">

                    <div class="w-full space-y-2">

                        <label
                            for="status"
                            class="block text-sm font-bold text-slate-800"
                        >
                            وضعیت جدید
                        </label>

                        <select
                            id="status"
                            name="status"
                            required
                            class="block min-h-12 w-full rounded-xl border border-slate-200 bg-white px-4 text-sm text-slate-900 shadow-sm outline-none transition hover:border-slate-300 focus:border-primary-500 focus:ring-4 focus:ring-primary-100"
                        >

                            <option value="pending" @selected($request->status === 'pending')>
                                در انتظار بررسی
                            </option>

                            <option value="reviewing" @selected($request->status === 'reviewing')>
                                در حال بررسی
                            </option>

                            <option value="approved" @selected($request->status === 'approved')>
                                تأیید شده
                            </option>

                            <option value="completed" @selected($request->status === 'completed')>
                                تکمیل شده
                            </option>

                            <option value="rejected" @selected($request->status === 'rejected')>
                                رد شده
                            </option>

                        </select>

                        @error('status')
                        <p class="text-xs font-medium leading-5 text-red-600">
                            {{ $message }}
                        </p>
                        @enderror

                    </div>


                    <div class="w-full space-y-2">

                        <label
                            for="admin_note"
                            class="block text-sm font-bold text-slate-800"
                        >
                            یادداشت مدیر
                        </label>

                        <textarea
                            id="admin_note"
                            name="admin_note"
                            rows="3"
                            class="block w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm outline-none transition placeholder:text-slate-400 hover:border-slate-300 focus:border-primary-500 focus:ring-4 focus:ring-primary-100"
                            placeholder="در صورت نیاز توضیحی ثبت کنید..."
                        >{{ old('admin_note') }}</textarea>

                        @error('admin_note')
                        <p class="text-xs font-medium leading-5 text-red-600">
                            {{ $message }}
                        </p>
                        @enderror

                    </div>

                </div>

                <div class="flex justify-end">

                    <x-button
                        type="submit"
                        variant="primary"
                        class="w-full sm:w-auto"
                    >
                        ذخیره وضعیت
                    </x-button>

                </div>

            </form>

        </section>

    </div>

</x-layouts.admin>
