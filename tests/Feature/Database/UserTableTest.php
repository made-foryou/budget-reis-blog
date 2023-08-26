<?php

declare(strict_types=1);

namespace Tests\Feature\Database;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
