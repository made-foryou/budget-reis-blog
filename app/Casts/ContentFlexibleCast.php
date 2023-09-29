<?php

namespace App\Casts;

use App\Nova\Flexible\Layouts\LatestPosts;
use App\Nova\Flexible\Layouts\FeaturedPosts;
use Whitecube\NovaFlexibleContent\Value\FlexibleCast;

class ContentFlexibleCast extends FlexibleCast
{
    protected $layouts = [
        'featured-posts' => FeaturedPosts::class,
        'latest-posts' => LatestPosts::class,
    ];
}
