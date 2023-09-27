<?php

namespace App\View\Models;

use App\Models\MetaAware;
use Illuminate\Contracts\Support\Arrayable;

final readonly class MetaViewModel implements Arrayable
{
    public function __construct(protected MetaAware $model) { }

    public function toArray(): array
    {
        return [
            'meta' => $this->model->meta,
        ];
    }

    public static function make(MetaAware $model): array
    {
        return (new self($model))->toArray();
    }
}
