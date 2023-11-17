<?php

declare(strict_types=1);

namespace Tests\Feature\Database;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostFactoryTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_can_create_posts()
    {
        $posts = Post::factory(10)->create();

        $this->assertDatabaseCount('posts', 10);

        $posts->each(fn (Post $post) => $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => $post->title,
        ]));
    }

    /** @test */
    public function it_can_create_featured_posts()
    {
        $posts = Post::factory(5)->create();

        $featured = Post::factory()->featured()->createOne();

        $this->assertDatabaseCount('posts', 6);

        $this->assertDatabaseHas('posts', [
            'id' => $featured->id,
            'title' => $featured->title,
            'is_featured' => 1
        ]);
    }
}
