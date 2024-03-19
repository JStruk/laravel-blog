<?php

use App\Http\Controllers\BlogPostController;
use App\Models\BlogPost;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware('throttle:20,1')->group(function () {
    Route::get('/', [BlogPostController::class, 'index'])->name('blog-posts.index');
    Route::get('/blog-posts/{postId}', [BlogPostController::class, 'view'])->name('blog-post.view');
});


