<?php

namespace App\Http\Requests\Account\FiberRequest;

use Hekmatinasser\Verta\Verta;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class StoreFiberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check()
            && $this->user()->isCustomer();
    }

    protected function prepareForValidation(): void
    {
        $normalizeDigits = static function ($value): ?string {
            if ($value === null) {
                return null;
            }

            return strtr(
                (string) $value,
                [
                    '۰' => '0',
                    '۱' => '1',
                    '۲' => '2',
                    '۳' => '3',
                    '۴' => '4',
                    '۵' => '5',
                    '۶' => '6',
                    '۷' => '7',
                    '۸' => '8',
                    '۹' => '9',

                    '٠' => '0',
                    '١' => '1',
                    '٢' => '2',
                    '٣' => '3',
                    '٤' => '4',
                    '٥' => '5',
                    '٦' => '6',
                    '٧' => '7',
                    '٨' => '8',
                    '٩' => '9',
                ]
            );
        };

        $numericFields = [
            'national_code',
            'birth_certificate_number',
            'mobile',
            'landline',
            'postal_code',
            'birth_year',
            'birth_month',
            'birth_day',
        ];

        $normalized = [];

        foreach ($numericFields as $field) {
            if ($this->has($field)) {
                $normalized[$field] = $normalizeDigits(
                    $this->input($field)
                );
            }
        }

        $year = trim((string) ($normalized['birth_year'] ?? ''));
        $month = trim((string) ($normalized['birth_month'] ?? ''));
        $day = trim((string) ($normalized['birth_day'] ?? ''));

        $normalized['birth_date'] =
            $year !== ''
            && $month !== ''
            && $day !== ''
                ? sprintf(
                '%04d/%02d/%02d',
                (int) $year,
                (int) $month,
                (int) $day
            )
                : null;

        $this->merge($normalized);
    }

    public function rules(): array
    {
        return [
            'full_name' => [
                'required',
                'string',
                'max:150',
            ],

            'father_name' => [
                'required',
                'string',
                'max:150',
            ],

            'national_code' => [
                'required',
                'digits:10',
                function (string $attribute, mixed $value, \Closure $fail): void {
                    $digits = str_split((string) $value);

                    if (count($digits) !== 10) {
                        return;
                    }

                    if (count(array_unique($digits)) === 1) {
                        $fail('کد ملی واردشده معتبر نیست.');

                        return;
                    }

                    $check = (int) $digits[9];
                    $sum = 0;

                    for ($i = 0; $i < 9; $i++) {
                        $sum += ((int) $digits[$i]) * (10 - $i);
                    }

                    $remainder = $sum % 11;

                    $valid =
                        $remainder < 2
                            ? $check === $remainder
                            : $check === (11 - $remainder);

                    if (! $valid) {
                        $fail('کد ملی واردشده معتبر نیست.');
                    }
                },
            ],

            'birth_certificate_number' => [
                'required',
                'string',
                'max:30',
            ],

            /*
             * UI fields
             */
            'birth_year' => [
                'required',
                'digits:4',
            ],

            'birth_month' => [
                'required',
                'integer',
                'between:1,12',
            ],

            'birth_day' => [
                'required',
                'integer',
                'between:1,31',
            ],

            /*
             * Server-side normalized Jalali snapshot.
             */
            'birth_date' => [
                'required',
                'string',
                'size:10',
            ],

            'mobile' => [
                'required',
                'string',
                'regex:/^09\d{9}$/',
            ],

            'landline' => [
                'nullable',
                'string',
                'max:20',
            ],

            'tariff_id' => [
                'required',
                'integer',
                Rule::exists('tariffs', 'id')
                    ->where(
                        fn ($query) => $query->where(
                            'is_active',
                            true
                        )
                    ),
            ],

            /*
             * Important:
             * The form submits has_modem, not modem_id.
             */
            'has_modem' => [
                'nullable',
                'boolean',
            ],

            'province' => [
                'required',
                'string',
                'max:100',
            ],

            'city' => [
                'required',
                'string',
                'max:100',
            ],

            'address' => [
                'required',
                'string',
                'max:5000',
            ],

            'postal_code' => [
                'required',
                'digits:10',
            ],

            'customer_note' => [
                'nullable',
                'string',
                'max:5000',
            ],
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator): void {
            $year = (int) $this->input('birth_year');
            $month = (int) $this->input('birth_month');
            $day = (int) $this->input('birth_day');

            if (
                $year <= 0
                || $month <= 0
                || $day <= 0
            ) {
                return;
            }

            if (! Verta::isValideDate($year, $month, $day)) {
                $validator->errors()->add(
                    'birth_date',
                    'تاریخ تولد واردشده معتبر نیست.'
                );
            }
        });
    }

    public function messages(): array
    {
        return [
            'full_name.required' =>
                'نام و نام خانوادگی الزامی است.',

            'full_name.max' =>
                'نام و نام خانوادگی نمی‌تواند بیشتر از ۱۵۰ کاراکتر باشد.',

            'father_name.required' =>
                'نام پدر الزامی است.',

            'father_name.max' =>
                'نام پدر نمی‌تواند بیشتر از ۱۵۰ کاراکتر باشد.',

            'national_code.required' =>
                'کد ملی الزامی است.',

            'national_code.digits' =>
                'کد ملی باید ۱۰ رقم باشد.',

            'birth_certificate_number.required' =>
                'شماره شناسنامه الزامی است.',

            'birth_year.required' =>
                'سال تولد الزامی است.',

            'birth_year.digits' =>
                'سال تولد باید ۴ رقم باشد.',

            'birth_month.required' =>
                'ماه تولد را انتخاب کنید.',

            'birth_month.integer' =>
                'ماه تولد معتبر نیست.',

            'birth_day.required' =>
                'روز تولد را انتخاب کنید.',

            'birth_day.integer' =>
                'روز تولد معتبر نیست.',

            'birth_date.required' =>
                'تاریخ تولد را کامل وارد کنید.',

            'birth_date.size' =>
                'تاریخ تولد معتبر نیست.',

            'mobile.required' =>
                'شماره موبایل الزامی است.',

            'mobile.regex' =>
                'شماره موبایل معتبر نیست. مثال: 09121234567',

            'tariff_id.required' =>
                'انتخاب تعرفه الزامی است.',

            'tariff_id.exists' =>
                'تعرفه انتخاب‌شده معتبر یا فعال نیست.',

            'has_modem.boolean' =>
                'وضعیت مودم معتبر نیست.',

            'province.required' =>
                'استان الزامی است.',

            'city.required' =>
                'شهر الزامی است.',

            'address.required' =>
                'آدرس الزامی است.',

            'postal_code.required' =>
                'کد پستی الزامی است.',

            'postal_code.digits' =>
                'کد پستی باید ۱۰ رقم باشد.',
        ];
    }
}
