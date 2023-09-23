<?php

namespace App\Nova;

use App\Models\Page;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\MorphOne;

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

            Boolean::make('Zichtbaar?', 'is_visible'),

            MorphOne::make('Route', 'route', RouteResource::class)
                ->onlyOnDetail(),
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
