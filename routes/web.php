<?php

use App\Models\BlogPost;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog-posts', function () {
    return Inertia::render('BlogPosts', ['blogPosts' => BlogPost::all()->map(function ($post) {
        return [
            'id' => $post->id,
            'title' => $post->title,
            'contents' => $post->contents,
            'created_at' => $post->created_at,
            'updated_at' => $post->updated_at,
            'created_diff_for_humans' => $post->created_at->diffForHumans(),
        ];
    })
    ]);
})->name('blog-posts');
