<?php

namespace App\Nova\Flexible\Presets;

use App\Nova\Flexible\Layouts\FeaturedCategories;
use App\Nova\Flexible\Layouts\FeaturedPosts;
use App\Nova\Flexible\Layouts\LatestPosts;
use App\Nova\Flexible\Layouts\Textual;
use Whitecube\NovaFlexibleContent\Flexible;
use Whitecube\NovaFlexibleContent\Layouts\Preset;

class DefaultPreset extends Preset
{
    /**
     * Execute the preset configuration
     *
     * @return void
     */
    public function handle(Flexible $field)
    {
        $field->addLayout(FeaturedPosts::class)
            ->addLayout(LatestPosts::class)
            ->addLayout(FeaturedCategories::class)
            ->addLayout(Textual::class);

        $field->fullWidth();
    }

}
