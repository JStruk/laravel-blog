<?php

use App\Filament\Resources\BlogPostResource;
use App\Models\BlogPostCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Livewire\livewire;
use App\Models\BlogPost;
use function Pest\Faker\fake;

uses(RefreshDatabase::class);

describe('Blog Post', function () {
    it('can create a blog post', function () {
        $blogPost = BlogPost::query()->create([
            'title' => 'Test Blog Post',
            'contents' => fake()->paragraph,
            'author' => fake()->name,
            'blog_post_category_id' => BlogPostCategory::factory()->create()->getKey()
        ]);

        expect(BlogPost::all())->toHaveCount(1);
        $this->assertDatabaseHas(BlogPost::class, [
            'title' => $blogPost->title,
            'contents' => $blogPost->contents,
        ]);
    });

    it('can render page', function () {
        $this->actingAs(User::factory()->create());
        $this->get(BlogPostResource::getUrl('create'))->assertSuccessful();
    });

    it('can create a new blog post using form', function () {
        $blogPost = BlogPost::factory()->make();

        livewire(BlogPostResource\Pages\CreateBlogPost::class)
            ->fillForm([
                'title' => $blogPost->title,
                'author' => $blogPost->author,
                'contents' => $blogPost->contents,
                'blog_post_category_id' => $blogPost->category->getKey()
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas(BlogPost::class, [
            'title' => $blogPost->title,
            'contents' => $blogPost->contents
        ]);
    });
});
