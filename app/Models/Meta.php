<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Database\Factories\MetaFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property-read int $id
 * @property-read class-string $describable_type
 * @property-read int $describable_id
 * @property-read Category|Page|Post $describable
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Carbon|null $deleted_at
 *
 * @property string $title
 * @property string $description
 * @property string|null $seo_title
 * @property string|null $seo_description
 *
 * @method static MetaFactory factory($count = null, $state = [])
 */
class Meta extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'social_title',
        'social_description',
    ];

    protected $casts = [
        'id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function describable(): MorphTo
    {
        return $this->morphTo('describable');
    }

    protected static function newFactory(): MetaFactory
    {
        return MetaFactory::new();
    }
}
