<?php

namespace App\QueryBuilders;

use App\Models\Route;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * @method Route|null first($columns = ['*'])
 * @method Collection<Route> get($columns = ['*'])
 */
class RouteQueryBuilder extends Builder
{
    public function forCache(): RouteQueryBuilder
    {
        return $this->orderBy('id');
    }
}
