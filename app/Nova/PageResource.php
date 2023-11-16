<?php

namespace App\Nova;

use Exception;
use App\Models\Page;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\MorphOne;
use Laravel\Nova\Fields\BelongsTo;
use App\Nova\Flexible\Layouts\Textual;
use App\Nova\Flexible\Layouts\LatestPosts;
use Whitecube\NovaFlexibleContent\Flexible;
use App\Nova\Flexible\Layouts\FeaturedPosts;
use App\Nova\Flexible\Layouts\FeaturedCategories;
use App\Nova\Flexible\Presets\DefaultPreset;
use App\Nova\Flexible\Resolvers\EditorJsResolver;

class PageResource extends Resource
{
    public static string $model = Page::class;

    public static $title = 'name';

    public static $group = 'Website';

    public static $search = [
        'id',
        'name',
        'slug'
    ];

    public static function label(): string
    {
        return 'Pagina\'s';
    }

    public static function singularLabel(): string
    {
        return 'Pagina';
    }

    /**
     * @throws Exception
     */
    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Naam', 'name')
                ->sortable()
                ->rules('required'),

            Slug::make('Url', 'slug')
                ->from('name')
                ->sortable()
                ->rules('required'),

            BelongsTo::make('Bovenliggende pagina', 'parent', PageResource::class)
                ->nullable(),

            Boolean::make('Zichtbaar?', 'is_visible'),

            Flexible::make('Inhoud', 'content')
                ->preset(DefaultPreset::class),

            MorphOne::make('Route', 'route', RouteResource::class)
                ->onlyOnDetail(),

            MorphOne::make('Meta', 'meta', MetaResource::class)
                ->asPanel(),

            HasMany::make('Onderliggende pagina\'s', 'children', PageResource::class),
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
}
