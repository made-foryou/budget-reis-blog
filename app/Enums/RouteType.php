<?php

namespace App\Enums;

use App\Models\Post;
use App\Models\Category;

enum RouteType: string
{
    case PAGE = 'page';
    case CATEGORY = 'category';
    case POST = 'post';

    public static function fromClass(string $class): RouteType
    {
        return match($class) {
            Category::class => RouteType::CATEGORY,
            Post::class => RouteType::POST,
        };
    }
}
