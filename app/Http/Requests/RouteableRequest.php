<?php

namespace App\Http\Requests;

use Exception;
use App\Models\Page;
use App\Enums\RouteType;
use App\Models\Post;
use App\Models\Route;
use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class RouteableRequest extends FormRequest
{
    /**
     * The type of the current route.
     */
    public ?RouteType $type = null;

    /**
     * The current route object.
     */
    public ?Route $route = null;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [];
    }

    /**
     * @throws Exception
     */
    public function getRoute(): ?Route
    {
        if (! $this->route) {
            $name = \Illuminate\Support\Facades\Route::currentRouteName();
            [$type, $id] = explode('.', $name);

            $this->type = RouteType::from($type);
            $this->route = Route::query()
                ->fromRouteable($this->type->getClass(), $id)
                ->firstOrFail();
        }

        return $this->route;
    }

    public function getModel(): Category|Post|Page
    {
        if ($this->getRoute() === null) {
            abort(404);
        }

        return $this->getRoute()->routeable;
    }
}
