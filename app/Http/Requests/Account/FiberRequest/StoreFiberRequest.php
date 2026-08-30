<?php

namespace App\Http\Requests\Account\FiberRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreFiberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check()
            && $this->user()->isCustomer();
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
            ],

            'birth_certificate_number' => [
                'required',
                'string',
                'max:30',
            ],

            'birth_date' => [
                'required',
                'string',
                'max:10',
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
                'exists:tariffs,id',
            ],

            'modem_id' => [
                'nullable',
                'integer',
                'exists:modems,id',
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

    public function messages(): array
    {
        return [
            'full_name.required' =>
                'نام و نام خانوادگی الزامی است.',

            'father_name.required' =>
                'نام پدر الزامی است.',

            'national_code.required' =>
                'کد ملی الزامی است.',

            'national_code.digits' =>
                'کد ملی باید ۱۰ رقم باشد.',

            'birth_certificate_number.required' =>
                'شماره شناسنامه الزامی است.',

            'birth_date.required' =>
                'تاریخ تولد الزامی است.',

            'mobile.required' =>
                'شماره موبایل الزامی است.',

            'mobile.regex' =>
                'شماره موبایل معتبر نیست.',

            'tariff_id.required' =>
                'انتخاب تعرفه الزامی است.',

            'tariff_id.exists' =>
                'تعرفه انتخاب‌شده معتبر نیست.',

            'modem_id.exists' =>
                'مودم انتخاب‌شده معتبر نیست.',

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