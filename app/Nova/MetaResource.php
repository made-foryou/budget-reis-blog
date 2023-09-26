<?php

namespace App\Nova;

use App\Models\Meta;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\MorphTo;

class MetaResource extends Resource
{
    public static string $model = Meta::class;

    public static $group = 'Seo / Meta';

    public static $title = 'title';

    public static $search = [
        'id',
        'title',
        'description',
        'seo_title',
        'seo_description',
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            MorphTo::make('Gekoppeld aan', 'describable')
                ->types([CategoryResource::class, PostResource::class, PageResource::class]),

            Text::make('Pagina titel', 'title')
                ->sortable()
                ->rules('required', 'string', 'max:255'),

            Text::make('Pagina omschrijving', 'description')
                ->sortable()
                ->rules('required', 'string'),

            Text::make('Pagina titel voor social media', 'social_title')
                ->sortable()
                ->rules('nullable', 'string', 'max:255'),

            Text::make('Pagina omschrijving voor social media', 'social_description')
                ->sortable()
                ->rules('nullable', 'string'),
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
        return 'Meta informatie';
    }

    public static function singularLabel(): string
    {
        return 'Meta';
    }
}
