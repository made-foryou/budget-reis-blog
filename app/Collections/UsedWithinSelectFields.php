<?php

namespace App\Collections;

use App\Models\Selectable;
use Illuminate\Database\Eloquent\Collection;

/**
 * @mixin Collection
 */
trait UsedWithinSelectFields
{
    public function forSelects(): array
    {
        return $this->mapWithKeys(
            fn (Selectable $model) => [$model->getKey() => $model->getTitle()]
        )
            ->toArray();
    }
}
