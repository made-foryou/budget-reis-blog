<?php

namespace App\Enums;

use Exception;
use App\Models\Post;
use App\Models\Category;

enum RouteType: string
{
    case PAGE = 'page';
    case CATEGORY = 'category';
    case POST = 'post';

    /**
     * @throws Exception
     * @return string
     */
    public function getClass(): string
    {
        return match ($this) {
            self::PAGE => throw new Exception('To be implemented'),
            self::CATEGORY => Category::class,
            self::POST => Post::class,
        };
    }

    public static function fromClass(string $class): RouteType
    {
        return match($class) {
            Category::class => RouteType::CATEGORY,
            Post::class => RouteType::POST,
        };
    }
}
