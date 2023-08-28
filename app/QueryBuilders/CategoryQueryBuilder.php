<?php

namespace App\QueryBuilders;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method Category|null first($columns = ['*'])
 */
class CategoryQueryBuilder extends Builder
{
    public function shownInMenu(): CategoryQueryBuilder
    {
        return $this->where('is_visible', true);
    }
}
