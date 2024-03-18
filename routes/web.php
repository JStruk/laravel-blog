<?php

use App\Models\BlogPost;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog-posts', function () {
    return Inertia::render('BlogPosts', [
        'blogPosts' => BlogPost::all()->map(function ($post) {
            return [
                'id' => $post->id,
                'title' => $post->title,
                'subtitle' => $post->subtitle,
                'contents' => $post->contents,
                'created_at' => $post->created_at,
                'updated_at' => $post->updated_at,
                'created_diff_for_humans' => $post->created_at->diffForHumans(),
                'author' => $post->author,
                'category' => $post->category->name
            ];
        })
    ]);
})->name('blog-posts');

Route::get('/blog-posts/{postId}', static function ($postId) {
    $blogPost = BlogPost::query()->find($postId);

    return Inertia::render('BlogPostPage', [
        'blogPost' => $blogPost,
        'createdAtHuman' => $blogPost->created_at->diffForHumans(),
        'author' => $blogPost->user
    ]);
});
