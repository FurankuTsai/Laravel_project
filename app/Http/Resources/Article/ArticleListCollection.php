<?php

namespace App\Http\Resources\Article;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ArticleListCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection->map(function ($article) {
            return [
                'article_id' => $article->article_id,
                'title'      => $article->title,
                'content'    => $article->content,
                'image'      => $article->image ?? null,
                'created_at' => $article->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $article->updated_at->format('Y-m-d H:i:s')
            ];
        })->all();
    }
}
