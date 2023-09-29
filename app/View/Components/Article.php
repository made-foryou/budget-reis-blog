<?php

declare(strict_types=1);

namespace App\View\Components;

use Closure;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * ## Article component
 * ---
 */
class Article extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Post $post,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.article');
    }
}
