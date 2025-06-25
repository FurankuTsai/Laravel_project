<?php

namespace App\Http\Resources\Article;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'article_id' => $this->article_id,
            'title'      => $this->title,
            'content'    => $this->content,
            'image'      => $this->image ?? null
            'created_at' => $article->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $article->updated_at->format('Y-m-d H:i:s')
        ];
    }
}
