<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostArticleRequest;
use App\Http\Requests\PutArticleRequest;
use App\Http\Requests\GetArticleListRequest;
use App\Http\Resources\Article\ArticleResource;
use App\Http\Resources\Article\ArticleListResource;
use App\Services\ArticleService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class ArticleController extends Controller
{
    protected $articleService;

    /**
     *  @param ArticleService $articleService 文章Service
     */
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function postArticle(PostArticleRequest $request): ArticleResource
    {
        $paramAry = $request->validated();

        $article = $this->articleService->add($paramAry);

        return new ArticleResource($article);
    }

    public function getArticle(int $articleId): ArticleResource
    {
        $article = $this->articleService->getById($articleId);

        return new ArticleResource($article);
    }

    public function putArticle(int $articleId, PutArticleRequest $request): JsonResponse
    {
        $paramAry = $request->validated();

        $article = $this->articleService->updateById($articleId, $paramAry);

        return response()->json($article);
    }
    
    public function getArticleList(GetArticleListRequest $request): ArticleListResource
    {
        $filter = $request->validated();

        $articleList = $this->articleService->listByFilter($filter);

        return new ArticleListResource($articleList);
    }

    public function deletetArticle(int $articleId): JsonResponse
    {
        $this->articleService->deleteById($articleId);

        return new JsonResponse(null);
    }
}
