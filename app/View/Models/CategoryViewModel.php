<?php

namespace App\View\Models;

use App\Models\Category;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\View\View;

final readonly class CategoryViewModel implements Arrayable, Responsable
{
    public function __construct(
        public Category $category,
    ) { }

    public function toArray(): array
    {
        return [
            'menu' => MenuViewModel::make(),
            'meta' => MetaViewModel::make($this->category),
            'category' => $this->category,
        ];
    }

    public function toResponse($request): View
    {
        return view('templates.category', [
            'model' => $this->toArray(),
        ]);
    }
}
