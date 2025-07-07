<?php

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Enums\Article\ArticleListOrderByEnum;
use App\Models\Article;

class ArticleRepository
{
    const DEFAULT_LIMIT = 20;

    /**
     * Construct
     *
     * @param Article $model Article Model
     */
    public function __construct(Article $model)
    {
        $this->model = $model;
    }

    public function add(array $data): Article
    {
        return $this->model->create($data);
    }

    public function getById(int $articleId): ?Article
    {
        return $this->model->find($articleId);
    }

    public function getListByFilter(array $filter): Collection|LengthAwarePaginator
    {
        $query = $this->model->query();

        if (isset($filter['article_id'])) {
            $query->where('article_id', $filter['article_id']);
        }

        if (isset($filter['title'])) {
            $query->where('title', $filter['title']);
        }

        if (isset($filter['content'])) {
            $query->where('content', $filter['content']);
        }

        // 欄位排序
        $limit   = $filter['limit'] ?? self::DEFAULT_LIMIT;
        $sort    = $filter['sort'] ?? 'DESC';
        $orderBy = $filter['order_by'] ?? ArticleListOrderByEnum::UPDATED_AT;
        $query->orderBy($orderBy, $sort);

        $article = $query->paginate($limit);

        return $article;
    }


    public function updateById(int $articleId, array $data): Article
    {
        $article = $this->model->findOrFail($articleId);

        $article->fill($data)->save();

        return $article;
    }

    public function deleteById(int $articleId): bool
    {
        $article = $this->model->findOrFail($articleId);

        return $article->delete();
    }
}
