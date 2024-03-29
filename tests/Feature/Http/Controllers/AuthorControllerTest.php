<?php

namespace Tests\Feature\Http\Controllers;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Utils\InstallsApp;

class AuthorControllerTest extends TestCase
{
    use RefreshDatabase, InstallsApp;

    protected function setUp(): void
    {
        parent::setUp();

        $this->installApp();
    }

    public function testAuthorRead()
    {
        $author = User::firstOrFail();

        $response = $this->json('GET', $author->url);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'meta',
            'data',
            'endpoints' => [
                'author_posts'
            ]
        ]);
    }

    public function testGetTeam()
    {
        $response = $this->json('GET', route('team'));
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'success',
            'message',
            'data'
        ]);
    }

    public function testAuthorShell()
    {
        $response = $this->get(route('author.shell'));
        $response->assertStatus(200);
    }
}
