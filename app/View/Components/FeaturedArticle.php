<?php

namespace App\View\Components;

use Closure;
use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * ## Featured article component
 * ---
 */
class FeaturedArticle extends Component
{
    /**
     * Constructor
     */
    public function __construct(
        public Post $post,
    ) {
        $this->post->load(['user']);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.featured-article');
    }
}
