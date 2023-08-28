<?php

namespace App\Models;

use App\Events\SavingModel;
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
 * @property-read int $id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property boolean $is_visible
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Carbon|null $deleted_at
 * @property-read Category|null $category
 * @property-read Collection<Category> $categories
 * @property-read Collection<Post> $posts
 *
 * @method static CategoryQueryBuilder query()
 * @method static CategoryFactory factory($count = null, $state = [])
 */
class Category extends Model implements GeneratesASlug
{
    use SoftDeletes;
    use GeneratesSlug;
    use HasFactory;

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
        'saving' => SavingModel::class,
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function getValueKey(): string
    {
        return 'name';
    }

    public function newEloquentBuilder($query): CategoryQueryBuilder
    {
        return new CategoryQueryBuilder($query);
    }
}
