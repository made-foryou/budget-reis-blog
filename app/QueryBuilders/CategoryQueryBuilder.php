<?php

namespace App\QueryBuilders;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method Category|null first($columns = ['*'])
 */
class CategoryQueryBuilder extends Builder
{
    public function firstLevel(): CategoryQueryBuilder
    {
        return $this->whereNull(columns: 'category_id');
    }

    public function shownInMenu(): CategoryQueryBuilder
    {
        return $this->where(column: 'is_visible', operator: '=', value: true);
    }
}
