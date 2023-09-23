<?php

namespace App\Nova;

use App\Models\Post;
use App\Nova\RouteResource;
use Laravel\Nova\Fields\ID;
use App\Models\AppModelsPost;
use Laravel\Nova\Fields\MorphOne;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class PostResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<Post>
     */
    public static string $model = Post::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'title', 'slug'
    ];

    /**
     * @var string
     */
    public static $group = 'Blog';

    public static function label(): string
    {
        return 'Berichten';
    }

    public static function singularLabel(): string
    {
        return 'Bericht';
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable(),

            Text::make(name: 'Titel', attribute: 'title')->sortable(),
            Slug::make(name: 'Slug', attribute: 'slug')->from('title'),

            BelongsTo::make('Auteur', 'user', 'App\Nova\User'),

            BelongsTo::make('Categorie', 'category', 'App\Nova\CategoryResource'),

            MorphOne::make('Route', 'route', RouteResource::class)
                ->onlyOnDetail(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request): array
    {
        return [];
    }
}
