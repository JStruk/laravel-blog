<?php

namespace App\Filament\Resources\BlogPostCategoryResource\Pages;

use App\Filament\Resources\BlogPostCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBlogPostCategory extends CreateRecord
{
    protected static string $resource = BlogPostCategoryResource::class;
}
