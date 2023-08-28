<?php

namespace App\View\Models;

use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Responsable;

class LandingPageViewModel implements Arrayable, Responsable
{
    public function toArray(): array
    {
        return [
            'menu' => MenuViewModel::make(),
        ];
    }

    public function toResponse($request): View
    {
        return view('templates.landing-page', [
            'model' => $this->toArray(),
        ]);
    }
}
