<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Http\Enums\Article\ArticleListOrderByEnum;

class GetArticleListRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'article_id'   => 'nullable|integer',
            'title'        => 'nullable|string',
            'content'      => 'nullable|string',
            'limit'        => 'nullable|integer',
            'page'         => 'nullable|integer',
            'sort'         => ['nullable', Rule::in('ASC', 'DESC')],
            'order_by'     => ['nullable', Rule::in(ArticleListOrderByEnum::getKeys())],
        ];
    }
}
