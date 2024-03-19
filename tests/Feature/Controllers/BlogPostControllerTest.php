<?php

use App\Models\BlogPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Inertia\Testing\AssertableInertia as Inertia;

uses(RefreshDatabase::class);

describe('BlogPostController', function () {
    it('renders blog posts index page', function () {
        $posts = BlogPost::factory()->count(5)->create();

        $response = $this->get(route('blog-posts.index'));

        $response->assertInertia(fn(Inertia $page) => $page->component('BlogPosts')->has('blogPosts', $posts->count())
        );
    });

    it('renders blog post view page', function () {
        Carbon::setTestNow('now');
        $post = BlogPost::factory()->create();

        $response = $this->get(route('blog-post.view', $post->id));

        $response
            ->assertInertia(fn(Inertia $page) => $page
                ->component('BlogPostPage')
                ->has('blogPost', fn(Inertia $page) => $page
                    ->where('id', $post->id)
                    ->where('title', $post->title)
                    ->where('subtitle', $post->subtitle)
                    ->where('author', $post->author)
                    ->where('contents', $post->contents)
                    ->where('blog_post_category_id', $post->category->id)
                    ->has('created_at')
                    ->has('updated_at')
                )
            );
    });
});
