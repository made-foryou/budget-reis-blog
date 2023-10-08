<?php

namespace App\Nova\Flexible\Layouts;

use App\Models\Post;
use App\Models\Category;
use Laravel\Nova\Fields\Select;
use Whitecube\NovaFlexibleContent\Layouts\Layout;

class FeaturedCategories extends Layout implements ContentLayout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = 'featured-categories';

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = 'FeaturedCategories';

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Select::make('Categorie #1', 'category_1')
                ->required()
                ->options(Category::query()->get()->forSelects()),

            Select::make('Categorie #2', 'category_2')
                ->required()
                ->options(Category::query()->get()->forSelects()),

            Select::make('Categorie #3', 'category_3')
                ->required()
                ->options(Category::query()->get()->forSelects()),

        ];
    }

    public function getView(): string
    {
        return 'flexible.layouts.featured-categories';
    }

    public function toArray(): array
    {
        return [
            'first' => Category::query()->findOrFail((int) $this->getAttribute('category_1')),
            'second' => Category::query()->findOrFail((int) $this->getAttribute('category_2')),
            'third' => Category::query()->findOrFail((int) $this->getAttribute('category_3')),
        ];
    }
}
