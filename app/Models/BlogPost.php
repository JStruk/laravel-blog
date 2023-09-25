<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'contents',
        'blog_post_category_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogPostCategory::class, 'blog_post_category_id');
    }
}
