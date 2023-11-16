<?php

namespace App\QueryBuilders;

use App\Models\Post;
use App\Collections\PostCollection;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method Post|null first($columns = ['*'])
 * @method PostCollection<Post> get($columns = ['*'])
 */
class PostQueryBuilder extends Builder
{
}
