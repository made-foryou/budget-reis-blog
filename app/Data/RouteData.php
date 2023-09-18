<?php

namespace App\Data;

use App\Enums\RouteType;
use Spatie\LaravelData\Data;

final class RouteData extends Data
{
    public function __construct(
        public readonly string $route,
        public readonly RouteType $type,
        public readonly int $id,
    ) { }
}
