<?php

namespace App\Http\Requests\Admin\Tariff;

use Illuminate\Foundation\Http\FormRequest;

class StoreTariffRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
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
                'unique:tariffs,slug',
            ],

            'speed_mbps' => [
                'required',
                'integer',
                'min:1',
            ],

            'price' => [
                'required',
                'integer',
                'min:0',
            ],

            'duration_days' => [
                'required',
                'integer',
                'min:1',
            ],

            'description' => [
                'nullable',
                'string',
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
}
