<?php

namespace App\View\Models;

use App\Models\Post;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\View\View;

final readonly class PostViewModel implements Arrayable, Responsable
{
    public function __construct(
        public Post $post,
    ) { }

    public function toArray(): array
    {
        return [
            'menu' => MenuViewModel::make(),
            'meta' => MetaViewModel::make($this->post),
            'post' => $this->post,
        ];
    }

    public function toResponse($request): View
    {
        return view('templates.post', [
            'model' => $this->toArray(),
        ]);
    }
}
