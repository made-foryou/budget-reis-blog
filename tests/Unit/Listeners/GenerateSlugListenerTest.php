<?php

namespace Tests\Unit\Listeners;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GenerateSlugListenerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_generates_a_slug_while_saving()
    {
        $title = $this->faker->sentence();

        $post = new Post([
            'title' => $title,
        ]);

        $post->save();

        $this->assertDatabaseHas('posts', [
            'title' => $title,
            'slug' => Str::slug($title),
        ]);

        $post = Post::query()->first();

        $this->assertEquals(Str::slug($title), $post->slug);
    }

    /** @test */
    public function it_generates_a_slug_from_the_given_slug()
    {
        $title = $this->faker->sentence();
        $slug = $this->faker->sentence();

        $post = new Post([
            'title' => $title,
            'slug' => $slug,
        ]);

        $post->save();

        $this->assertDatabaseHas('posts', [
            'title' => $title,
            'slug' => Str::slug($slug),
        ]);

        $post = Post::query()->first();

        $this->assertEquals(Str::slug($slug), $post->slug);
    }

    /** @test */
    public function it_generates_nothing_when_nothing_is_changed§()
    {
        Post::factory()->createOne();

        $post = Post::query()->first();

        $post->save();

        $this->assertEquals(Str::slug($post->title), $post->slug);
    }
}
