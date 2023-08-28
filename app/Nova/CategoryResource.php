<?php

namespace App\Nova;

use App\Models\Category;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;

class CategoryResource extends Resource
{
    public static string $model = Category::class;

    public static $title = 'name';

    public static $search = [
        'id', 'name', 'description', 'slug'
    ];

    public static $group = 'Blog';

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Naam', 'name')
                ->sortable()
                ->rules('required'),

            Slug::make('Slug', 'slug')
                ->from('name')
                ->sortable()
                ->rules('required'),

            Textarea::make('Omschrijving', 'description')
                ->sortable()
                ->rules('required'),

            BelongsTo::make('Category', 'category', CategoryResource::class)
                ->nullable(),

            HasMany::make('Categories', 'categories', CategoryResource::class),

            HasMany::make('Berichten', 'posts', PostResource::class),
        ];
    }

    public function cards(Request $request): array
    {
        return [];
    }

    public function filters(Request $request): array
    {
        return [];
    }

    public function lenses(Request $request): array
    {
        return [];
    }

    public function actions(Request $request): array
    {
        return [];
    }

    public static function label(): string
    {
        return 'Categorieën';
    }

    public static function singularLabel(): string
    {
        return 'Categorie';
    }
}
