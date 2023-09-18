<?php

use App\Filament\Resources\BlogPostResource;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Livewire\livewire;
use App\Models\BlogPost;
use function Pest\Faker\fake;

uses(RefreshDatabase::class, TestCase::class);

describe('Blog Post', function () {
    it('can create a blog post', function () {
        $blogPost = BlogPost::query()->create([
            'title' => 'Test Blog Post',
            'contents' => fake()->paragraph,
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

    it('can create', function () {
        $newData = BlogPost::factory()->make();

        livewire(BlogPostResource\Pages\CreateBlogPost::class)
            ->fillForm([
                'title' => $newData->title,
                'contents' => $newData->contents
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas(BlogPost::class, [
            'title' => $newData->title,
            'contents' => $newData->contents
        ]);
    });
});