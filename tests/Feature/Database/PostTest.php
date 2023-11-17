<?php

declare(strict_types=1);

namespace Tests\Feature\Database;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_can_be_created()
    {
        $title = $this->faker->sentence();

        $post = new Post([
            'title' => $title,
            'slug' => Str::slug($title),
            'summary' => $this->faker->text(),
            'content' => '{}',
        ]);

        $post->save();

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => $post->title,
            'summary' => $post->summary,
        ]);
    }

    /** @test */
    public function it_can_be_created_via_the_factory()
    {
        $post = Post::factory()->createOne();

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => $post->title,
        ]);
    }

    /** @test */
    public function it_generates_a_slug_automatically()
    {
        $title = $this->faker->sentence();

        $post = new Post([
            'title' => $title,
            'summary' => $this->faker->text(),
            'content' => '{}',
        ]);

        $post->save();

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'slug' => Str::slug($title),
        ]);
    }
}
