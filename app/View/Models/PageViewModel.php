<?php

namespace App\View\Models;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Responsable;

final readonly class PageViewModel implements Arrayable, Responsable
{
    public function __construct(
        public Page $page,
    ) { }

    /**
     * Get the instance as an array.
     *
     * @return array<TKey, TValue>
     */
    public function toArray(): array
    {
        return [
            'menu' => MenuViewModel::make(),
            'meta' => MetaViewModel::make($this->page),
            'page' => $this->page,
        ];
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  Request  $request
     *
     * @return View
     */
    public function toResponse($request): View
    {
        return view('templates.page', [
            'model' => $this->toArray(),
        ]);
    }
}
