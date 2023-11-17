<?php

namespace App\Models;

use App\Casts\ContentFlexibleCast;
use App\Events\ModelSavedEvent;
use App\Events\ModelSavingEvent;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Database\Factories\PostFactory;
use App\Collections\PostCollection;
use App\QueryBuilders\PostQueryBuilder;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * ## Post model
 * @property-read int $id
 * @property string $title
 * @property string $slug
 * @property-read int $user_id
 * @property-read int|null $category_id
 * @property string|null $summary
 * @property mixed $content
 * @property boolean $is_featured
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 * @property-read User $user
 * @property-read Category $category
 *
 * @method static PostFactory factory($count = null, $state = [])
 * @method static PostQueryBuilder query()
 */
class Post extends Model implements
    GeneratesASlug, Routeable, MetaAware, Selectable, HasMedia
{
    use SoftDeletes;
    use HasFactory;
    use GeneratesSlug;
    use HasRoute;
    use InteractsWithMedia;

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'slug',
        'summary',
        'content',
        'is_featured',
    ];

    protected $attributes = [
        'content' => '{}',
    ];

    protected $casts = [
        'content' => ContentFlexibleCast::class,
        'is_featured' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * @var class-string[]
     */
    protected $dispatchesEvents = [
        'saving' => ModelSavingEvent::class,
        'saved' => ModelSavedEvent::class,
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function meta(): MorphOne
    {
        return $this->morphOne(Meta::class, 'describable');
    }

    public function getRoute(): string
    {
        $route = '';

        if ($this->category !== null) {
            $route = $this->category->getRoute();
        }

        return $route .'/'. $this->slug;
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('featured')
            ->singleFile();
    }

    public function newEloquentBuilder($query): PostQueryBuilder
    {
        return new PostQueryBuilder($query);
    }

    public function newCollection(array $models = []): PostCollection
    {
        return new PostCollection($models);
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
