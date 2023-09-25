<?php

namespace App\View\Models;

use App\Models\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Responsable;

class LandingPageViewModel implements Arrayable, Responsable
{
    public function page(): Page
    {
        $selected = (int) nova_get_setting('landing_page_id');
        return Page::query()->findOrFail($selected);
    }

    public function toArray(): array
    {
        return [
            'page' => $this->page(),
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
