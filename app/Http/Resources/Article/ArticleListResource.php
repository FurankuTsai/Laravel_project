<?php

namespace App\Http\Resources\Article;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Article\ArticleListCollection;

/**
 * ArticleListResource class
 * 
 */
class ArticleListResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param mixed $request Request
     *
     * @return array
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function toArray($request)
    {
        $paginator = $this->resource;

        return [
            'detail'        => new ArticleListCollection(collect($paginator->items())),
            'current_page'  => $paginator->currentPage(),
            'total'         => $paginator->total(),
            'total_page'    => $paginator->lastPage(),
            'limit'         => $paginator->perPage(),
        ];
    }
}
