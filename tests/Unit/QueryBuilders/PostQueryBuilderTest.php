<?php

namespace Tests\Unit\QueryBuilders;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Support\Str;
use App\QueryBuilders\PostQueryBuilder;

class PostQueryBuilderTest extends TestCase
{
    /** @test */
    public function the_post_model_uses_the_post_query_builder()
    {
        $this->assertInstanceOf(PostQueryBuilder::class, Post::query());
    }

    /** @test */
    public function it_can_search_for_featured_posts()
    {
        $query = Post::query()->featured();

        $this->assertTrue(
            Str::contains($query->toSql(), 'where "is_featured" = ?')
        );

        $this->assertEquals(
            [1],
            $query->getBindings()
        );
    }

    /** @test */
    public function it_can_search_for_not_featured_posts()
    {
        $query = Post::query()->notFeatured();

        $this->assertTrue(
            Str::contains($query->toSql(), 'where "is_featured" = ?')
        );

        $this->assertEquals(
            [0],
            $query->getBindings()
        );
    }
}
