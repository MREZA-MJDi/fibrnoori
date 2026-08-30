<x-layouts.admin
    title="جزئیات درخواست | فیبر نوری"
    heading="جزئیات درخواست"
>

    @php
        $statusLabels = [
            'pending' => 'در انتظار بررسی',
            'reviewing' => 'در حال بررسی',
            'approved' => 'تأیید شده',
            'rejected' => 'رد شده',
        ];

        $statusClasses = [
            'pending' => 'border-amber-200 bg-amber-50 text-amber-700',
            'reviewing' => 'border-blue-200 bg-blue-50 text-blue-700',
            'approved' => 'border-indigo-200 bg-indigo-50 text-indigo-700',
            'rejected' => 'border-red-200 bg-red-50 text-red-700',
        ];

        $historyClasses = [
            'pending' => 'bg-amber-50 text-amber-700',
            'reviewing' => 'bg-blue-50 text-blue-700',
            'approved' => 'bg-indigo-50 text-indigo-700',
            'rejected' => 'bg-red-50 text-red-700',
        ];

        $currentStatusClass =
            $statusClasses[$request->status]
            ?? 'border-slate-200 bg-slate-50 text-slate-600';
    @endphp


    <div class="space-y-6">

        <x-flash />


        {{-- Header --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

            <div class="flex flex-col gap-5 xl:flex-row xl:items-center xl:justify-between">

                <div class="min-w-0">

                    <div class="flex flex-wrap items-center gap-2">

                        <span
                            class="rounded-full border px-3 py-1.5 text-xs font-black {{ $currentStatusClass }}"
                        >
                            {{ $statusLabels[$request->status] ?? $request->status }}
                        </span>

                        <span class="text-xs font-medium text-slate-400">
                            درخواست #{{ $request->id }}
                        </span>

                    </div>

                    <h2 class="mt-3 break-all font-mono text-xl font-black tracking-tight text-slate-950 sm:text-2xl lg:text-3xl">
                        {{ $request->tracking_code }}
                    </h2>

                    <p class="mt-2 text-sm text-slate-500">
                        ثبت شده در
                        {{ $request->created_at?->format('Y/m/d - H:i') }}
                    </p>

                </div>


                <div class="flex flex-col gap-2 sm:flex-row">

                    <a
                        href="{{ route('admin.requests.index') }}"
                        class="inline-flex min-h-11 items-center justify-center rounded-xl border border-slate-200 px-5 text-sm font-bold text-slate-700 transition hover:bg-slate-50"
                    >
                        بازگشت به درخواست‌ها
                    </a>

                    <a
                        href="{{ route('admin.requests.export', $request) }}"
                        class="inline-flex min-h-11 items-center justify-center gap-2 rounded-xl bg-primary-600 px-5 text-sm font-black text-white transition hover:bg-primary-700"
                    >
                        دانلود Excel

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
                                d="M12 3v11m0 0 4-4m-4 4-4-4M5 21h14"
                            />
                        </svg>
                    </a>

                </div>

            </div>

        </section>


        {{-- Customer --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

            <div class="mb-6">

                <h3 class="text-lg font-black text-slate-950">
                    اطلاعات متقاضی
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    اطلاعات هویتی و تماس ثبت‌شده برای این درخواست.
                </p>

            </div>


            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">

                {{-- Full name --}}
                <div class="rounded-2xl bg-slate-50 p-4">

                    <p class="text-xs font-bold text-slate-400">
                        نام و نام خانوادگی
                    </p>

                    <p class="mt-2 break-words text-sm font-black text-slate-900">
                        {{ $request->full_name ?: ($request->user?->name ?? 'ثبت نشده') }}
                    </p>

                </div>


                {{-- Father name --}}
                <div class="rounded-2xl bg-slate-50 p-4">

                    <p class="text-xs font-bold text-slate-400">
                        نام پدر
                    </p>

                    <p class="mt-2 break-words text-sm font-black text-slate-900">
                        {{ $request->father_name ?: 'ثبت نشده' }}
                    </p>

                </div>


                {{-- National code --}}
                <div class="rounded-2xl bg-slate-50 p-4">

                    <p class="text-xs font-bold text-slate-400">
                        کد ملی
                    </p>

                    <p
                        dir="ltr"
                        class="mt-2 text-sm font-black text-slate-900"
                    >
                        {{ $request->national_code }}
                    </p>

                </div>


                {{-- Birth certificate --}}
                <div class="rounded-2xl bg-slate-50 p-4">

                    <p class="text-xs font-bold text-slate-400">
                        شماره شناسنامه
                    </p>

                    <p
                        dir="ltr"
                        class="mt-2 text-sm font-black text-slate-900"
                    >
                        {{ $request->birth_certificate_number ?: 'ثبت نشده' }}
                    </p>

                </div>


                {{-- Birth date --}}
                <div class="rounded-2xl bg-slate-50 p-4">

                    <p class="text-xs font-bold text-slate-400">
                        تاریخ تولد
                    </p>

                    <p
                        dir="ltr"
                        class="mt-2 text-sm font-black text-slate-900"
                    >
                        {{ $request->birth_date ?: 'ثبت نشده' }}
                    </p>

                </div>


                {{-- Mobile --}}
                <div class="rounded-2xl bg-slate-50 p-4">

                    <p class="text-xs font-bold text-slate-400">
                        شماره موبایل
                    </p>

                    <p
                        dir="ltr"
                        class="mt-2 text-sm font-black text-slate-900"
                    >
                        {{ $request->mobile }}
                    </p>

                </div>


                {{-- Landline --}}
                <div class="rounded-2xl bg-slate-50 p-4">

                    <p class="text-xs font-bold text-slate-400">
                        شماره ثابت
                    </p>

                    <p
                        dir="ltr"
                        class="mt-2 text-sm font-black text-slate-900"
                    >
                        {{ $request->landline ?: 'ثبت نشده' }}
                    </p>

                </div>

            </div>

        </section>


        {{-- Address --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

            <div class="mb-6">

                <h3 class="text-lg font-black text-slate-950">
                    آدرس نصب
                </h3>

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
                        آدرس کامل
                    </p>

                    <p class="mt-2 break-words text-sm leading-8 text-slate-800">
                        {{ $request->address }}
                    </p>

                </div>


                <div class="rounded-2xl bg-slate-50 p-4">

                    <p class="text-xs font-bold text-slate-400">
                        کد پستی
                    </p>

                    <p
                        dir="ltr"
                        class="mt-2 text-sm font-black text-slate-900"
                    >
                        {{ $request->postal_code }}
                    </p>

                </div>

            </div>

        </section>


        {{-- Products --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

            <div class="mb-6">

                <h3 class="text-lg font-black text-slate-950">
                    سرویس و تجهیزات
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    جزئیات تعرفه و وضعیت مودم این درخواست.
                </p>

            </div>


            <div class="grid gap-4 lg:grid-cols-2">

                {{-- Tariff --}}
                <div class="rounded-2xl border border-slate-200 p-5">

                    <p class="text-xs font-bold text-slate-400">
                        تعرفه
                    </p>

                    <p class="mt-2 break-words text-base font-black text-slate-900">
                        {{ $request->tariff?->name ?? 'بدون تعرفه' }}
                    </p>

                    @if ($request->tariff?->speed_mbps)

                        <p class="mt-2 text-xs text-primary-600">
                            سرعت
                            {{ number_format($request->tariff->speed_mbps) }}
                            Mbps
                        </p>

                    @endif

                    <p class="mt-4 text-sm text-slate-500">
                        مبلغ تعرفه:
                        <span class="font-black text-slate-800">
                            {{ number_format($request->tariff_price) }}
                            تومان
                        </span>
                    </p>

                </div>


                {{-- Modem --}}
                <div class="rounded-2xl border border-slate-200 p-5">

                    <p class="text-xs font-bold text-slate-400">
                        مودم
                    </p>

                    <p class="mt-2 break-words text-base font-black text-slate-900">
                        {{ $request->modem?->name ?? 'مودم شخصی' }}
                    </p>

                    <p class="mt-4 text-sm text-slate-500">
                        مبلغ مودم:
                        <span class="font-black text-slate-800">
                            {{ number_format($request->modem_price) }}
                            تومان
                        </span>
                    </p>

                </div>

            </div>


            {{-- Total --}}
            <div class="mt-5 rounded-2xl bg-slate-950 p-5 text-white">

                <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">

                    <span class="text-sm font-bold text-slate-300">
                        مبلغ نهایی
                    </span>

                    <span class="text-2xl font-black">
                        {{ number_format($request->total_price) }}
                        تومان
                    </span>

                </div>

            </div>

        </section>


        {{-- Notes --}}
        @if ($request->customer_note || $request->admin_note)

            <section class="grid gap-4 lg:grid-cols-2">

                @if ($request->customer_note)

                    <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

                        <h3 class="text-sm font-black text-slate-900">
                            توضیحات مشتری
                        </h3>

                        <p class="mt-3 break-words text-sm leading-7 text-slate-600">
                            {{ $request->customer_note }}
                        </p>

                    </div>

                @endif


                @if ($request->admin_note)

                    <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

                        <h3 class="text-sm font-black text-slate-900">
                            یادداشت مدیر
                        </h3>

                        <p class="mt-3 break-words text-sm leading-7 text-slate-600">
                            {{ $request->admin_note }}
                        </p>

                    </div>

                @endif

            </section>

        @endif


        {{-- Status history --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

            <div class="mb-6">

                <h3 class="text-lg font-black text-slate-950">
                    تاریخچه وضعیت
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    تمام تغییرات وضعیت این درخواست.
                </p>

            </div>


            @if ($request->statusHistories->isNotEmpty())

                <div class="space-y-4">

                    @foreach ($request->statusHistories->sortByDesc('created_at') as $history)

                        <div class="flex gap-4">

                            <div class="flex shrink-0 flex-col items-center">

                                <span
                                    class="grid size-10 place-items-center rounded-xl {{ $historyClasses[$history->to_status] ?? 'bg-slate-100 text-slate-600' }}"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.8"
                                        stroke="currentColor"
                                        class="size-5"
                                    >
                                        <circle
                                            cx="12"
                                            cy="12"
                                            r="8.5"
                                        />
                                        <path
                                            stroke-linecap="round"
                                            d="M12 7v5l3 2"
                                        />
                                    </svg>
                                </span>

                            </div>


                            <div class="min-w-0 flex-1 rounded-2xl bg-slate-50 p-4">

                                <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">

                                    <div class="flex flex-wrap items-center gap-2">

                                        @if ($history->from_status)

                                            <span class="text-sm font-bold text-slate-500">
                                                {{ $statusLabels[$history->from_status] ?? $history->from_status }}
                                            </span>

                                            <span class="text-slate-300">
                                                →
                                            </span>

                                        @endif

                                        <span class="text-sm font-black text-slate-900">
                                            {{ $statusLabels[$history->to_status] ?? $history->to_status }}
                                        </span>

                                    </div>


                                    <time
                                        class="text-xs text-slate-400"
                                        datetime="{{ $history->created_at?->toIso8601String() }}"
                                    >
                                        {{ $history->created_at?->format('Y/m/d H:i') }}
                                    </time>

                                </div>


                                @if ($history->changedBy)

                                    <p class="mt-2 text-xs text-slate-400">
                                        تغییر توسط:
                                        <span class="font-bold text-slate-600">
                                            {{ $history->changedBy->name ?? $history->changedBy->mobile }}
                                        </span>
                                    </p>

                                @endif


                                @if ($history->note)

                                    <p class="mt-3 break-words text-sm leading-7 text-slate-600">
                                        {{ $history->note }}
                                    </p>

                                @endif

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-5 py-10 text-center">

                    <p class="text-sm font-bold text-slate-500">
                        هنوز تغییری برای وضعیت این درخواست ثبت نشده است.
                    </p>

                </div>

            @endif

        </section>


        {{-- Admin actions --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

            <div class="mb-6">

                <h3 class="text-lg font-black text-slate-950">
                    مدیریت درخواست
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    وضعیت درخواست را تغییر دهید یا پس از دانلود فایل، آن را تکمیل و حذف کنید.
                </p>

            </div>


            {{-- Status form --}}
            <form
                method="POST"
                action="{{ route('admin.requests.status', $request) }}"
                class="space-y-5"
            >

                @csrf
                @method('PATCH')


                <div class="grid gap-5 lg:grid-cols-2">

                    {{-- Status --}}
                    <div class="space-y-2">

                        <label
                            for="status"
                            class="block text-sm font-bold text-slate-800"
                        >
                            وضعیت
                        </label>

                        <select
                            id="status"
                            name="status"
                            required
                            class="block min-h-12 w-full rounded-xl border border-slate-200 bg-white px-4 text-sm text-slate-900 shadow-sm outline-none transition hover:border-slate-300 focus:border-primary-500 focus:ring-4 focus:ring-primary-100"
                        >

                            @foreach ($statusLabels as $value => $label)

                                <option
                                    value="{{ $value }}"
                                    @selected(old('status', $request->status) === $value)
                                >
                                    {{ $label }}
                                </option>

                            @endforeach

                        </select>

                        @error('status')
                        <p class="text-xs font-medium leading-5 text-red-600">
                            {{ $message }}
                        </p>
                        @enderror

                    </div>


                    {{-- Note --}}
                    <div class="space-y-2">

                        <label
                            for="note"
                            class="block text-sm font-bold text-slate-800"
                        >
                            یادداشت مدیر
                        </label>

                        <textarea
                            id="note"
                            name="note"
                            rows="3"
                            maxlength="5000"
                            class="block w-full resize-y rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm leading-7 text-slate-900 shadow-sm outline-none transition placeholder:text-slate-400 hover:border-slate-300 focus:border-primary-500 focus:ring-4 focus:ring-primary-100"
                            placeholder="در صورت نیاز توضیح وارد کنید..."
                        >{{ old('note') }}</textarea>

                        @error('note')
                        <p class="text-xs font-medium leading-5 text-red-600">
                            {{ $message }}
                        </p>
                        @enderror

                    </div>

                </div>


                <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

                    <button
                        type="submit"
                        class="inline-flex min-h-11 items-center justify-center gap-2 rounded-xl bg-primary-600 px-5 text-sm font-black text-white transition hover:bg-primary-700"
                    >
                        ذخیره وضعیت

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            class="size-5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="m5 12 4 4L19 7"
                            />
                        </svg>

                    </button>

                </div>

            </form>


            {{-- Complete/Delete --}}
            <div class="mt-6 border-t border-slate-100 pt-6">

                <div class="rounded-2xl border border-red-200 bg-red-50 p-4">

                    <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

                        <div class="min-w-0">

                            <p class="text-sm font-black text-red-900">
                                تکمیل و حذف درخواست
                            </p>

                            <p class="mt-1 text-xs leading-6 text-red-700">
                                مطمئن شوید فایل Excel را دانلود کرده‌اید.
                                پس از تأیید، اطلاعات این درخواست و تاریخچه آن از سیستم حذف می‌شود.
                            </p>

                        </div>


                        <form
                            method="POST"
                            action="{{ route('admin.requests.complete', $request) }}"
                            onsubmit="return confirmCompleteRequest();"
                            class="shrink-0"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="inline-flex min-h-11 w-full items-center justify-center gap-2 rounded-xl bg-red-600 px-5 text-sm font-black text-white transition hover:bg-red-700 lg:w-auto"
                            >
                                تکمیل درخواست

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    class="size-5"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M5 12.5 9.5 17 19 7.5"
                                    />
                                </svg>

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </section>

    </div>


    <script>
        function confirmCompleteRequest() {
            return confirm(
                'آیا مطمئن هستید؟\n\n' +
                'با تکمیل این درخواست، اطلاعات درخواست و تاریخچه آن از سیستم حذف خواهد شد.\n\n' +
                'در صورتی که Excel را دانلود کرده‌اید و مطمئن هستید، تأیید کنید.'
            );
        }
    </script>

</x-layouts.admin>