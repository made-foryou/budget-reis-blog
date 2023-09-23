<?php

namespace App\View\Models;

use App\Models\Page;
use App\Models\Category;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Collection;

class MenuViewModel implements Arrayable
{
    public function toArray(): array
    {
        return [
            'categories' => $this->categories(),
            'pages' => $this->pages(),
        ];
    }

    protected function categories(): Collection
    {
        return Category::query()
            ->firstLevel()
            ->shownInMenu()
            ->ordered()
            ->get();
    }

    protected function pages(): Collection
    {
        return Page::query()
            ->firstLevel()
            ->showInMenu()
            ->ordered()
            ->get();
    }

    public static function make(): array
    {
        return (new self())->toArray();
    }
}
