<?php

namespace App\Nova;

use App\Models\Category;
use App\Nova\Flexible\Presets\DefaultPreset;
use App\Nova\RouteResource;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\MorphOne;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use Outl1ne\NovaSortable\Traits\HasSortableRows;
use Ebess\AdvancedNovaMediaLibrary\Fields\Media;
use Whitecube\NovaFlexibleContent\Flexible;

class CategoryResource extends Resource
{
    use HasSortableRows;

    public static string $model = Category::class;

    public static $title = 'name';

    public static $search = [
        'id',
        'name',
        'description',
        'cotent',
        'slug'
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

            Media::make('Uitgelichte afbeelding', 'featured')
                ->enableExistingMedia(),

            Textarea::make('Omschrijving', 'description')
                ->sortable()
                ->rules('required'),

            Boolean::make('Zichtbaar?', 'is_visible')
                ->help('Is de categorie zichtbaar op de website?'),

            Flexible::make('Inhoud', 'conten')
                ->preset(DefaultPreset::class),

            BelongsTo::make('Category', 'category', CategoryResource::class)
                ->nullable(),

            MorphOne::make('Route', 'route', RouteResource::class)
                ->onlyOnDetail(),

            MorphOne::make('Meta', 'meta', MetaResource::class)
                ->asPanel(),

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
