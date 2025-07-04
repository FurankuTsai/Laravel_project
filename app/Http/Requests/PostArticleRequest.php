<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostArticleRequest extends FormRequest
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
            'image'   => 'nullable|url|max:2048',
        ];
    }
}
