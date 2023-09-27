<?php

namespace App\View\Models;

use App\Models\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Responsable;

final readonly class LandingPageViewModel implements Arrayable, Responsable
{
    public function page(): Page
    {
        $selected = (int) nova_get_setting('landing_page_id');
        return Page::query()->findOrFail($selected);
    }

    public function toArray(): array
    {
        $page = $this->page();

        return [
            'page' => $page,
            'menu' => MenuViewModel::make(),
            'meta' => MetaViewModel::make($page),
        ];
    }

    public function toResponse($request): View
    {
        return view('templates.landing-page', [
            'model' => $this->toArray(),
        ]);
    }
}
