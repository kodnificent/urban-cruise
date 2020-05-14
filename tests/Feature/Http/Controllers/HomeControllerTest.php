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
        $response = $this->get(route('home'), [
            'Accept' => 'application/json'
        ]);

        $response->assertStatus(200);
    }

    public function testHomeSkeleton()
    {
        $response = $this->get(route('home.skeleton'));

        $response->assertStatus(200);
    }
}
