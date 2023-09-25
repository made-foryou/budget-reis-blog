<?php

namespace App\QueryBuilders;

use App\Models\Page;
use App\Collections\PageCollection;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method Page|null first($columns = ['*'])
 * @method Page firstOrFail($columns = ['*'])
 * @method Page firstOrNew(array $attributes = [], array $values = [])
 * @method PageCollection<Page> get($columns = ['*'])
 *
 * @method PageQueryBuilder ordered(string $direction = 'asc')
 */
class PageQueryBuilder extends Builder
{
    public function firstLevel(): PageQueryBuilder
    {
        return $this->whereNull(columns: 'page_id');
    }

    public function showInMenu(): PageQueryBuilder
    {
        return $this->where(
            column: 'is_visible',
            operator: '=',
            value: true
        );
    }
}
