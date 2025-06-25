<?php

namespace App\Http\Enums\Article;

use BenSampo\Enum\Enum;

/**
 * ArticleListOrderByEnum class
 * 
 */
final class ArticleListOrderByEnum extends Enum
{
    const TITLE      = 'title';
    const CONTENT    = 'content';
    const UPDATED_AT = 'updated_at';
}
