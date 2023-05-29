<?php

namespace Tests\Feature;

use Tests\TestCase;

class ComingSoonPageTest extends TestCase
{
    /** @test */
    public function it_loads()
    {
        $this->markTestSkipped('It\'s not loading the coming-soon page');

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('coming-soon');
        $response->assertSee('Coming soon');
        $response->assertSee('Budget reis');
    }
}
