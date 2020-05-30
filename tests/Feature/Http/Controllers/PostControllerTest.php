<?php

namespace Tests\Feature\Http\Controllers;

use App\Post;
use App\PostCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Utils\InstallsApp;

class PostControllerTest extends TestCase
{
    use RefreshDatabase, InstallsApp;

    protected function setUp(): void
    {
        parent::setUp();

        $this->installApp();
    }

    public function testPostList()
    {
        $category = PostCategory::firstOrFail();

        $response = $this->json('GET', $category->endpoints['posts']);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'meta',
            'data'
        ]);
    }

    public function testPostRead()
    {
        $post = Post::firstOrFail();

        $response = $this->json('GET', $post->url);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'meta',
            'data',
            'prev_post',
            'next_post',
        ]);
    }

    public function testPostShell()
    {
        $response = $this->get(route('post.shell'));
        $response->assertStatus(200);
    }
}
