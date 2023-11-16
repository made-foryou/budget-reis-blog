<?php

namespace App\Nova\Flexible\Layouts;

use App\Models\Post;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Whitecube\NovaFlexibleContent\Layouts\Layout;

class LatestPosts extends Layout implements ContentLayout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = 'latest-posts';

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = 'LatestPosts';

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Text::make('Titel', 'title'),

            Textarea::make('Omschrijving', 'description'),
        ];
    }

    public function getView(): string
    {
        return 'flexible.layouts.latest-posts';
    }

    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'posts' => Post::query()->orderByDesc('created_at')->limit(3)->get(),
        ]);
    }
}
