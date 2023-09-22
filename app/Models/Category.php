<?php

namespace App\Models;

use App\Events\ModelSavedEvent;
use App\Events\ModelSavingEvent;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\CategoryFactory;
use App\QueryBuilders\CategoryQueryBuilder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Category model
 *
 * @category Models
 * @package  App
 * @author   Menno Tempelaar <menno@made-foryou.nl>
 *
 * @property-read int $id
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Carbon|null $deleted_at
 * @property-read Category|null $category
 * @property-read Collection<Category> $categories
 * @property-read Collection<Post> $posts
 * @property-read Route|null $route
 *
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property boolean $is_visible
 *
 * @method static CategoryQueryBuilder query()
 * @method static CategoryFactory factory($count = null, $state = [])
 */
class Category extends Model implements GeneratesASlug, Routeable
{
    use SoftDeletes;
    use GeneratesSlug;
    use HasFactory;
    use HasRoute;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_visible',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    protected $dispatchesEvents = [
        'saving' => ModelSavingEvent::class,
        'saved' => ModelSavedEvent::class,
    ];

    /**
     * Get the parent category
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the child categories.
     *
     * @return HasMany
     */
    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    /**
     * Get the connected posts
     *
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Get the value key.
     *
     * @return string
     */
    public function getValueKey(): string
    {
        return 'name';
    }

    /**
     * Creates the new Eloquent query builder object.
     *
     * @param Builder $query Query object
     *
     * @return CategoryQueryBuilder
     */
    public function newEloquentBuilder($query): CategoryQueryBuilder
    {
        return new CategoryQueryBuilder($query);
    }

    /**
     * @return string
     */
    public function getRoute(): string
    {
        $route = '';

        if ($this->category !== null) {
            $route = $this->category->getRoute();
        }

        return $route . '/' . $this->slug;
    }
}
