<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Page;
use Illuminate\Support\Facades\DB;
use Outl1ne\NovaSettings\Models\Settings;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LandingPageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_loads()
    {
        $page = Page::factory()->createOne();

        DB::table('nova_settings')
            ->insert([
                'key' => 'landing_page_id',
                'value' => $page->id,
            ]);

        $this->get('/')
            ->assertStatus(200)
            ->assertSee(config('app.name'))
            ->assertViewIs('templates.landing-page');
    }
}
