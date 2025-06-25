<?php

namespace App\Services;

use App\Repositories\ArticleRepository;
use Illuminate\Support\Facades\Storage;

class ArticleService
{
    protected $articleRepo;

    public function __construct(ArticleRepository $articleRepo)
    {
        $this->articleRepo = $articleRepo;
    }

    public function add(array $data)
    {
        return $this->articleRepo->add($data);
    }

    public function getById(int $articleId)
    {
        return $this->articleRepo->getById($articleId);
    }

    public function updateById(int $articleId, array $data)
    {
        return $this->articleRepo->updateById($articleId, $data);
    }

    public function listByFilter(array $filter)
    {
        return $this->articleRepo->getListByFilter($filter);
    }

    public function deleteById(int $articleId)
    {
        return $this->articleRepo->deleteById($articleId);
    }
}
