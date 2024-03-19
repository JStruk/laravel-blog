<?php

namespace Tests\Filament\Resources;

use App\Filament\Resources\BlogPostCategoryResource;
use App\Models\BlogPostCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Livewire\livewire;

uses(RefreshDatabase::class);

describe('Blog Post Category Filament Resource', function () {
    it('can create a blog post category', function () {
        $blogPostCategory = BlogPostCategory::query()->create([
            'name' => fake()->name,
        ]);

        expect(BlogPostCategory::all())->toHaveCount(1);
        $this->assertDatabaseHas(BlogPostCategory::class, [
            'name' => $blogPostCategory->name,
        ]);
    });

    it('can render page', function () {
        $this->actingAs(User::factory()->create());
        $this->get(BlogPostCategoryResource::getUrl('create'))->assertSuccessful();
    });

    it('can create a new blog post using form', function () {
        $blogPostCategory = BlogPostCategory::factory()->make();

        livewire(BlogPostCategoryResource\Pages\CreateBlogPostCategory::class)
            ->fillForm([
                'name' => $blogPostCategory->name,
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas(BlogPostCategory::class, [
            'name' => $blogPostCategory->name,
        ]);
    });

    it('can list blog post categories', function () {
        $categories = BlogPostCategory::factory()->count(10)->create();

        livewire(BlogPostCategoryResource\Pages\ListBlogPostCategories::class)
            ->assertCanSeeTableRecords($categories);
    });

    it('can edit a blog post category', function () {
        $category = BlogPostCategory::factory()->create([
            'name' => 'some-category',
        ]);

        $newName = fake()->name;

        livewire(BlogPostCategoryResource\Pages\EditBlogPostCategory::class, [$category->id])
            ->fillForm([
                'name' => $newName,
            ])
            ->call('save')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas(BlogPostCategory::class, [
            'id' => $category->id,
            'name' => $newName,
        ]);
    });
});
