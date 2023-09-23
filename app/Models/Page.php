<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use App\Events\ModelSavedEvent;
use App\Events\ModelSavingEvent;
use Database\Factories\PageFactory;
use Spatie\EloquentSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use App\QueryBuilders\PageQueryBuilder;
use Spatie\EloquentSortable\SortableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property string $name
 * @property string $slug
 * @property boolean $is_visible
 * @property int $index
 *
 * @property-read int $id
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Carbon|null $deleted_at
 * @property-read Route|null $route
 *
 * @method static PageFactory factory($count = null, $state = [])
 * @method static PageQueryBuilder query()
 */
class Page extends Model implements GeneratesASlug, Routeable, Sortable
{
    use SoftDeletes;
    use HasFactory;
    use GeneratesSlug;
    use SortableTrait;
    use HasRoute;

    protected $fillable = [
        'name',
        'slug',
        'is_visible',
        'index'
    ];

    protected $casts = [
        'is_visible' => 'boolean',
        'index' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public array $sortable = [
        'order_column_name' => 'index',
        'sort_when_creating' => true,
    ];

    protected $dispatchesEvents = [
        'saving' => ModelSavingEvent::class,
        'saved' => ModelSavedEvent::class,
    ];

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
     * Generates the route for the model.
     *
     * @return string
     */
    public function getRoute(): string
    {
        $route = '';

        return $route . '/' . $this->slug;
    }

    protected static function newFactory(): PageFactory
    {
        return PageFactory::new();
    }

    public function newEloquentBuilder($query): PageQueryBuilder
    {
        return new PageQueryBuilder($query);
    }
}
