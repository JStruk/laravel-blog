<?php

namespace Tests\Unit\Models;

use App\Models\BlogPost;
use App\Models\BlogPostCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;

uses(RefreshDatabase::class);

describe('BlogPostCategory', static function () {
    it('can return posts for given category', function () {
        Carbon::setTestNow('now');
        [$educationCategory, $funCategory] = BlogPostCategory::factory(2)
            ->sequence(
                ['name' => 'Education'],
                ['name' => 'Fun']
            )
            ->create();
        $educationBlogPost = BlogPost::factory()->for($educationCategory, 'category')->create();
        $funBlogPost = BlogPost::factory()->for($funCategory, 'category')->create();

        $educationPosts = $educationCategory->posts;
        expect($educationPosts)->toHaveCount(1);
        $educationPosts->each(function ($post) use ($educationCategory, $educationBlogPost) {
            expect($post->id)
                ->toEqual($educationBlogPost->id)
                ->and($post->category->name)
                ->toEqual($educationCategory->name);
        });
    });
});
