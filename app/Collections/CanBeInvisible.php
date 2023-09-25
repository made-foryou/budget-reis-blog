<?php

namespace App\Collections;

use App\Models\Visibility;

trait CanBeInvisible
{
    public function visible(): self
    {
        return $this->filter(fn (Visibility $item) => $item->isVisible());
    }
}
