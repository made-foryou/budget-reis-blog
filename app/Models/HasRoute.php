<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * @mixin Model
 */
trait HasRoute
{
    public function route(): MorphOne
    {
        return $this->morphOne(Route::class, 'routeable');
    }
}
