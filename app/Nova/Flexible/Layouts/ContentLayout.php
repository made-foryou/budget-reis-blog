<?php

namespace App\Nova\Flexible\Layouts;

use Illuminate\Contracts\Support\Arrayable;

interface ContentLayout extends Arrayable
{
    public function getView(): string;
}
