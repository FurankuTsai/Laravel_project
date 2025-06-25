<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'article';

    protected $primaryKey = 'article_id';

    /**
     * 
     */
    protected $fillable = [
        'title',
        'content',
        'image',
    ];

    /**
     *
     */
    protected $appends = ['image_url'];

    /**
     * 取得完整圖片網址
     */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return null;
    }
}
