<?php

namespace App\Http\Requests\Admin\Modem;

use Illuminate\Foundation\Http\FormRequest;

class StoreModemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && $this->user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:150',
            ],

            'slug' => [
                'required',
                'string',
                'max:180',
                'unique:modems,slug',
            ],

            'description' => [
                'nullable',
                'string',
                'max:5000',
            ],

            'price' => [
                'required',
                'integer',
                'min:0',
            ],

            'stock' => [
                'required',
                'integer',
                'min:0',
            ],

            'features' => [
                'nullable',
                'array',
            ],

            'features.*' => [
                'nullable',
                'string',
                'max:255',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'image.image' => 'فایل انتخاب‌شده باید یک تصویر معتبر باشد.',
            'image.mimes' => 'فرمت تصویر باید JPG، JPEG، PNG یا WEBP باشد.',
            'image.max' => 'حجم تصویر نباید بیشتر از ۲ مگابایت باشد.',

            'name.required' => 'نام مودم الزامی است.',
            'slug.required' => 'Slug مودم الزامی است.',
            'slug.unique' => 'این Slug قبلاً ثبت شده است.',
            'price.required' => 'قیمت مودم الزامی است.',
            'stock.required' => 'موجودی مودم الزامی است.',
        ];
    }
}
