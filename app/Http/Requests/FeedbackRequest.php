<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string:255'],
            'phone' => ['nullable', 'string:255'],
            'email' => ['nullable', 'string:255'],
            'comment' => ['nullable', 'string:1024'],
            'services' => ['required', 'array'],
            'services.*' => ['string'],
            'budget' => ['required', 'string'],
            'files' => ['array'],
            'files.*' => ['file'],
        ];
    }
}
