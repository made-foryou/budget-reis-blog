<?php

namespace App\Models;

use App\Events\SavingModel;
use Illuminate\Support\Carbon;
use Database\Factories\PostFactory;
use App\QueryBuilders\PostQueryBuilder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * ## Post model
 * @property-read int $id
 * @property string $title
 * @property string $slug
 * @property-read int $user_id
 * @property-read int|null $category_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 * @property-read User $user
 * @property-read Category $category
 *
 * @method static PostFactory factory($count = null, $state = [])
 * @method static PostQueryBuilder query()
 */
class Post extends Model implements GeneratesASlug
{
    use HasFactory;
    use GeneratesSlug;

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'slug',
    ];

    /**
     * @var class-string[]
     */
    protected $dispatchesEvents = [
        'saving' => SavingModel::class,
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

    public function newEloquentBuilder($query): PostQueryBuilder
    {
        return new PostQueryBuilder($query);
    }
}
