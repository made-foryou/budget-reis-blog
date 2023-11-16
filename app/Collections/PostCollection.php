<?php

namespace App\Collections;

use Illuminate\Database\Eloquent\Collection;

class PostCollection extends Collection
{
    use CanBeInvisible;
    use UsedWithinSelectFields;
}
