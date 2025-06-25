<?php

use App\Http\Controllers\ArticleController;

Route::post('/articles', [ArticleController::class, 'postArticle']);
Route::get('/articles/{article_id}', [ArticleController::class, 'getArticle']);
Route::put('/articles/{article_id}', [ArticleController::class, 'putArticle']);
Route::get('/articles', [ArticleController::class, 'getArticleList']);
Route::delete('/articles/{article_id}', [ArticleController::class, 'deletetArticle']);
