<?php

namespace App\QueryBuilders;

use Exception;
use App\Models\Route;
use App\Data\RouteData;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * @method Route|null first($columns = ['*'])
 * @method Route firstOrFail($columns = ['*'])
 * @method Collection<Route> get($columns = ['*'])
 */
class RouteQueryBuilder extends Builder
{
    public function forCache(): RouteQueryBuilder
    {
        return $this->orderBy('id');
    }

    /**
     * @throws Exception
     */
    public function fromRouteable(string $type, int $id): RouteQueryBuilder
    {
        return $this->where('routeable_type', $type)
            ->where('routeable_id', $id);
    }
}
