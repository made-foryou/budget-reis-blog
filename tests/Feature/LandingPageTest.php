<?php

namespace Tests\Feature;

use Tests\TestCase;

class LandingPageTest extends TestCase
{
    /** @test */
    public function it_loads()
    {
        $this->get('/')
            ->assertStatus(200)
            ->assertSee(config('app.name'))
            ->assertViewIs('templates.landing-page');
    }
}
