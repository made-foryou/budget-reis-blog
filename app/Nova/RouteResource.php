<?php

namespace App\Nova;

use App\Models\Route;
use Laravel\Nova\Fields\Field;
use Laravel\Nova\Fields\MorphTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class RouteResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string class-string<Route>
     */
    public static string $model = Route::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'route',
    ];

    public static $group = 'Links';

    /**
     * Get the fields displayed by the resource.
     *
     * @param  NovaRequest  $request
     * @return array<Field>
     */
    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Url', 'route'),

            MorphTo::make('Hoort bij', 'routeable'),

            DateTime::make('Aangemaakt op', 'created_at')
                ->hideFromIndex(),

            DateTime::make('Laatst gewijzigd op', 'updated_at'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request): array
    {
        return [];
    }
}
