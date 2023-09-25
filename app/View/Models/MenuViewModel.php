<?php

namespace App\View\Models;

use App\Models\Page;
use App\Models\Category;
use App\Collections\PageCollection;
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
            ->whereHas('route')
            ->ordered()
            ->get();
    }

    protected function pages(): PageCollection
    {
        return Page::query()
            ->firstLevel()
            ->showInMenu()
            ->whereHas('route')
            ->ordered()
            ->get();
    }

    public static function make(): array
    {
        return (new self())->toArray();
    }
}
