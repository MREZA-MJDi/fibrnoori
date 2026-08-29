<x-layouts.admin
    title="تعرفه‌ها | فیبر نوری"
    heading="مدیریت تعرفه‌ها"
>

    <div class="space-y-6">

        {{-- Header --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

            <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                <div class="min-w-0">

                    <span class="inline-flex rounded-full bg-primary-50 px-3 py-1.5 text-xs font-black text-primary-700">
                        مدیریت سرویس
                    </span>

                    <h2 class="mt-3 text-2xl font-black tracking-tight text-slate-950 sm:text-3xl">
                        تعرفه‌های اینترنت
                    </h2>

                    <p class="mt-2 max-w-2xl text-sm leading-7 text-slate-500">
                        تعرفه‌های اینترنت فیبر نوری را مشاهده، ایجاد و ویرایش کنید.
                    </p>

                </div>

                <a
                    href="{{ route('admin.tariffs.create') }}"
                    class="inline-flex min-h-11 w-full shrink-0 items-center justify-center gap-2 rounded-xl bg-primary-600 px-5 text-sm font-black text-white shadow-sm transition hover:bg-primary-700 sm:w-auto"
                >
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
                            d="M12 5v14M5 12h14"
                        />
                    </svg>

                    افزودن تعرفه
                </a>

            </div>

        </section>


        <x-flash />


        {{-- Tariffs --}}
        <section class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

            @if ($tariffs->isNotEmpty())

                {{-- Desktop --}}
                <div class="hidden overflow-x-auto md:block">

                    <table class="w-full min-w-[900px] text-right">

                        <thead class="border-b border-slate-200 bg-slate-50">

                        <tr>
                            <th class="px-6 py-4 text-xs font-black text-slate-500">
                                تعرفه
                            </th>

                            <th class="px-6 py-4 text-xs font-black text-slate-500">
                                سرعت
                            </th>

                            <th class="px-6 py-4 text-xs font-black text-slate-500">
                                مدت
                            </th>

                            <th class="px-6 py-4 text-xs font-black text-slate-500">
                                قیمت
                            </th>

                            <th class="px-6 py-4 text-xs font-black text-slate-500">
                                وضعیت
                            </th>

                            <th class="px-6 py-4 text-xs font-black text-slate-500">
                                ترتیب
                            </th>

                            <th class="px-6 py-4"></th>
                        </tr>

                        </thead>

                        <tbody class="divide-y divide-slate-100">

                        @foreach ($tariffs as $tariff)

                            <tr class="transition hover:bg-slate-50/70">

                                <td class="px-6 py-5">

                                    <p class="text-sm font-black text-slate-900">
                                        {{ $tariff->name }}
                                    </p>

                                    <p class="mt-1 font-mono text-[11px] text-slate-400">
                                        {{ $tariff->slug }}
                                    </p>

                                </td>


                                <td class="px-6 py-5">

                                    <span class="text-sm font-black text-slate-900">
                                        {{ number_format($tariff->speed_mbps) }}
                                    </span>

                                    <span class="text-xs text-slate-400">
                                        Mbps
                                    </span>

                                </td>


                                <td class="px-6 py-5">

                                    <span class="text-sm font-black text-slate-900">
                                        {{ number_format($tariff->duration_days) }}
                                    </span>

                                    <span class="text-xs text-slate-400">
                                        روز
                                    </span>

                                </td>


                                <td class="px-6 py-5">

                                    <p class="text-sm font-black text-slate-900">
                                        {{ number_format($tariff->price) }}
                                    </p>

                                    <p class="mt-1 text-xs text-slate-400">
                                        تومان
                                    </p>

                                </td>


                                <td class="px-6 py-5">

                                    @if ($tariff->is_active)

                                        <span class="inline-flex rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1.5 text-xs font-black text-emerald-700">
                                            فعال
                                        </span>

                                    @else

                                        <span class="inline-flex rounded-full border border-slate-200 bg-slate-50 px-3 py-1.5 text-xs font-black text-slate-600">
                                            غیرفعال
                                        </span>

                                    @endif

                                </td>


                                <td class="px-6 py-5">

                                    <span class="text-sm font-bold text-slate-700">
                                        {{ number_format($tariff->sort_order) }}
                                    </span>

                                </td>


                                <td class="px-6 py-5">

                                    <div class="flex items-center justify-end gap-2">

                                        <a
                                            href="{{ route('admin.tariffs.edit', $tariff) }}"
                                            class="inline-flex min-h-9 items-center justify-center rounded-lg bg-slate-100 px-3 text-xs font-black text-slate-700 transition hover:bg-slate-200"
                                        >
                                            ویرایش
                                        </a>

                                        <form
                                            method="POST"
                                            action="{{ route('admin.tariffs.destroy', $tariff) }}"
                                            onsubmit="return confirm('آیا از حذف این تعرفه مطمئن هستید؟');"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="inline-flex min-h-9 items-center justify-center rounded-lg bg-red-50 px-3 text-xs font-black text-red-700 transition hover:bg-red-100"
                                            >
                                                حذف
                                            </button>
                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                        </tbody>

                    </table>

                </div>


                {{-- Mobile --}}
                <div class="divide-y divide-slate-100 md:hidden">

                    @foreach ($tariffs as $tariff)

                        <article class="p-5">

                            <div class="flex items-start justify-between gap-3">

                                <div class="min-w-0">

                                    <p class="truncate text-sm font-black text-slate-950">
                                        {{ $tariff->name }}
                                    </p>

                                    <p class="mt-1 truncate font-mono text-[11px] text-slate-400">
                                        {{ $tariff->slug }}
                                    </p>

                                </div>


                                @if ($tariff->is_active)

                                    <span class="shrink-0 rounded-full bg-emerald-50 px-2.5 py-1 text-[10px] font-black text-emerald-700">
                                        فعال
                                    </span>

                                @else

                                    <span class="shrink-0 rounded-full bg-slate-100 px-2.5 py-1 text-[10px] font-black text-slate-500">
                                        غیرفعال
                                    </span>

                                @endif

                            </div>


                            <div class="mt-4 grid grid-cols-2 gap-3">

                                <div class="rounded-2xl bg-slate-50 p-3">

                                    <p class="text-[11px] font-bold text-slate-400">
                                        سرعت
                                    </p>

                                    <p class="mt-1 text-sm font-black text-slate-900">
                                        {{ number_format($tariff->speed_mbps) }}
                                        Mbps
                                    </p>

                                </div>


                                <div class="rounded-2xl bg-slate-50 p-3">

                                    <p class="text-[11px] font-bold text-slate-400">
                                        قیمت
                                    </p>

                                    <p class="mt-1 text-sm font-black text-slate-900">
                                        {{ number_format($tariff->price) }}
                                    </p>

                                    <p class="mt-0.5 text-[10px] text-slate-400">
                                        تومان
                                    </p>

                                </div>

                            </div>


                            <div class="mt-3 rounded-2xl bg-slate-50 p-3">

                                <p class="text-[11px] font-bold text-slate-400">
                                    مدت
                                </p>

                                <p class="mt-1 text-sm font-black text-slate-900">
                                    {{ number_format($tariff->duration_days) }}
                                    روز
                                </p>

                            </div>


                            <div class="mt-4 flex items-center justify-between gap-3">

                                <span class="text-[11px] font-bold text-slate-400">
                                    ترتیب نمایش:
                                    {{ number_format($tariff->sort_order) }}
                                </span>


                                <div class="flex gap-2">

                                    <a
                                        href="{{ route('admin.tariffs.edit', $tariff) }}"
                                        class="inline-flex min-h-10 items-center justify-center rounded-xl bg-slate-100 px-4 text-xs font-black text-slate-700"
                                    >
                                        ویرایش
                                    </a>

                                    <form
                                        method="POST"
                                        action="{{ route('admin.tariffs.destroy', $tariff) }}"
                                        onsubmit="return confirm('آیا از حذف این تعرفه مطمئن هستید؟');"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="inline-flex min-h-10 items-center justify-center rounded-xl bg-red-50 px-4 text-xs font-black text-red-700"
                                        >
                                            حذف
                                        </button>
                                    </form>

                                </div>

                            </div>

                        </article>

                    @endforeach

                </div>


                @if ($tariffs->hasPages())

                    <div class="border-t border-slate-200 px-5 py-4 sm:px-6">
                        {{ $tariffs->links() }}
                    </div>

                @endif

            @else

                <div class="px-6 py-16 text-center">

                    <div class="mx-auto grid size-16 place-items-center rounded-3xl bg-slate-100 text-slate-400">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.8"
                            stroke="currentColor"
                            class="size-7"
                        >
                            <path
                                stroke-linecap="round"
                                d="M12 3v18M7 7h10M7 12h10M7 17h10"
                            />
                        </svg>

                    </div>

                    <h3 class="mt-5 text-base font-black text-slate-950">
                        هنوز تعرفه‌ای ثبت نشده است
                    </h3>

                    <p class="mx-auto mt-2 max-w-md text-sm leading-7 text-slate-500">
                        اولین تعرفه اینترنت را ایجاد کنید تا در سایت به مشتریان نمایش داده شود.
                    </p>

                    <div class="mt-6">

                        <a
                            href="{{ route('admin.tariffs.create') }}"
                            class="inline-flex min-h-11 items-center justify-center rounded-xl bg-primary-600 px-5 text-sm font-black text-white transition hover:bg-primary-700"
                        >
                            افزودن اولین تعرفه
                        </a>

                    </div>

                </div>

            @endif

        </section>

    </div>

</x-layouts.admin>
