<?php

namespace App\Collections;

use App\Models\Page;
use Illuminate\Database\Eloquent\Collection;

class PageCollection extends Collection
{
    use CanBeInvisible;
    use UsedWithinSelectFields;
}
