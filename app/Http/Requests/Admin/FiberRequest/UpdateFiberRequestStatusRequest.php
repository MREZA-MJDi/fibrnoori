<?php

namespace App\Http\Requests\Admin\FiberRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFiberRequestStatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()?->isAdmin() === true;
    }

    public function rules(): array
    {
        return [
            'status' => [
                'required',
                'string',
                Rule::in([
                    'pending',
                    'reviewing',
                    'approved',
                    'completed',
                    'rejected',
                ]),
            ],

            'note' => [
                'nullable',
                'string',
                'max:5000',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'status.required' => 'انتخاب وضعیت الزامی است.',
            'status.in' => 'وضعیت انتخاب‌شده معتبر نیست.',

            'note.string' => 'یادداشت مدیر باید متن باشد.',
            'note.max' => 'یادداشت مدیر نمی‌تواند بیشتر از ۵۰۰۰ کاراکتر باشد.',
        ];
    }
}
