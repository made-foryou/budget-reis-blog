<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property-read int $id
 * @property-read int $routeable_id
 * @property-read string $routeable_type
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 *
 * @property string $route
 */
class Route extends Model
{
    use HasFactory;

    protected $fillable = [
        'route',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function routeable(): MorphTo
    {
        return $this->morphTo('routeable');
    }
}
