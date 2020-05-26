<?php

namespace Tests\Feature\Http\Controllers;

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

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCategoryShow()
    {
        $response = $this->json('GET', $this->childCategoryTC()->endpoints['posts']);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'meta',
            'data'
        ]);
    }

    /**
     * Get a parent category test case
     *
     * @return \App\PostCategory
     */
    protected function parentCategoryTC()
    {
        return PostCategory::parentCategories()->firstOrFail();
    }

    /**
     * Get a child category test case
     *
     * @return \App\PostCategory
     */
    protected function childCategoryTC()
    {
        return PostCategory::childCategories()->firstOrFail();
    }
}
