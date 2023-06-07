<?php

declare(strict_types=1);

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * ## Featured article component
 * ---
 */
final class FeaturedArticle extends Component
{
    /**
     * Constructor
     */
    public function __construct(
        public readonly string $title,
        public readonly string $image,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.featured-article');
    }
}
