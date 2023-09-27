<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * @property-read Meta|null $meta
 */
interface MetaAware
{
    public function meta(): MorphOne;
}
