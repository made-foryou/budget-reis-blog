<?php

declare(strict_types=1);

namespace Tests\Feature\Database;

use Domain\Shared\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTableTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_can_be_created()
    {
        $user = new User([
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->email(),
            'password' => Hash::make($this->faker->word),
        ]);

        $user->save();

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ]);
    }

    /** @test */
    public function it_can_be_created_via_the_factory()
    {
        $user = User::factory()->createOne();

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ]);
    }
}
