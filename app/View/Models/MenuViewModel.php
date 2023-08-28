<?php

namespace App\View\Models;

use App\Models\Category;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Collection;

class MenuViewModel implements Arrayable
{
    public function toArray(): array
    {
        return [
            'categories' => $this->categories(),
        ];
    }

    protected function categories(): Collection
    {
        return Category::query()
            ->firstLevel()
            ->shownInMenu()
            ->get();
    }

    public static function make(): array
    {
        return (new self())->toArray();
    }
}
