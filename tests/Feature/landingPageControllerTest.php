<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class landingPageControllerTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function landing_page_have_a_casteaching_series_component(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('welcome');

        $response->assertSee('id="casteaching_series"', false);
    }
}
