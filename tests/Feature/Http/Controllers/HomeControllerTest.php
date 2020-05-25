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

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHome()
    {
        $response = $this->json('GET', route('home'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'meta' => [
                'seo_title',
                'seo_description',
                'seo_canonical',
            ],
            'data' => [
                'title',
                'featured_posts',
                'categories'
            ]
        ]);
    }

    public function testHomeSkeleton()
    {
        $response = $this->get(route('home.skeleton'));

        $response->assertStatus(200);
    }
}
