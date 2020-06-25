<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\Utils\InstallsApp;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase, InstallsApp;

    protected function setUp(): void
    {
        parent::setUp();

        $this->installApp();
    }

    public function testHomeView()
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
    }

    public function testHomeJson()
    {
        $response = $this->json('GET', route('home'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'meta' => [
                'seo_title',
                'seo_description',
                'seo_canonical',
            ],
            'featured_posts'
        ]);
    }

    public function testHomeShell()
    {
        $response = $this->get(route('home.shell'));

        $response->assertStatus(200);
    }
}
