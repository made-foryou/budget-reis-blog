<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Model
 */
interface Selectable
{
    public function getTitle(): string;
}
