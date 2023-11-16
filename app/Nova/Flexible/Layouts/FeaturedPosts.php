<?php

namespace App\Nova\Flexible\Layouts;

use App\Models\Post;
use Laravel\Nova\Fields\Select;
use Whitecube\NovaFlexibleContent\Layouts\Layout;

class FeaturedPosts extends Layout implements ContentLayout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = 'featured-posts';

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = 'Uitgelicht nieuws';

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Select::make('Uitgelicht nieuwsbericht', 'post_1')
                ->options(Post::query()->get()->forSelects())
                ->required(),

            Select::make('Uitgelicht nieuwsbericht', 'post_2')
                ->options(Post::query()->get()->forSelects())
                ->required(),
        ];
    }

    public function getView(): string
    {
        return 'flexible.layouts.featured-posts';
    }

    public function toArray(): array
    {
        return [
            'first' => Post::query()->findOrFail((int) $this->getAttribute('post_1')),
            'second' => Post::query()->findOrFail((int) $this->getAttribute('post_2'))
        ];
    }
}
