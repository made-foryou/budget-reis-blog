<?php

namespace App\Nova\Flexible\Layouts;

use Laravel\Nova\Fields\Text;
use Whitecube\NovaFlexibleContent\Layouts\Layout;

class FeaturedPosts extends Layout
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
    protected $title = 'FeaturedPosts';

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Text::make('Titel', 'title'),
        ];
    }

}
