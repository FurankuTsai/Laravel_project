<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PutArticleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'nullable|image|max:2048',
        ];
    }
}
