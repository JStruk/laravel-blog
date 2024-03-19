<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Inertia\Inertia;

class BlogPostController extends Controller
{
    public function index(): \Inertia\Response
    {
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
    }

    public function view($postId): \Inertia\Response
    {
        $blogPost = BlogPost::query()->find($postId);

        return Inertia::render('BlogPostPage', [
            'blogPost' => $blogPost,
            'createdAtHuman' => $blogPost->created_at->diffForHumans(),
            'author' => $blogPost->user
        ]);
    }
}
