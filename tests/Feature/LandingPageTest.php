<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LandingPageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_loads()
    {
        $this->get('/')
            ->assertStatus(200)
            ->assertSee(config('app.name'))
            ->assertViewIs('templates.landing-page');
    }
}
