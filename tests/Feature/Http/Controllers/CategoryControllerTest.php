<?php

namespace Tests\Feature\Http\Controllers;

use App\PostCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Utils\InstallsApp;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase, InstallsApp;

    protected function setUp(): void
    {
        parent::setUp();

        $this->installApp();
    }

    public function testCategoryShow()
    {
        $response = $this->json('GET', $this->childCategoryTC()->url);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'meta' => [
                'seo_title',
                'seo_description',
                'seo_canonical',
                'title',
                'description',
            ],
            'data' => [
                'parent',
                'children',
            ]
        ]);
    }

    public function testCategoryShell()
    {
        $response = $this->get(route('category.shell'));

        $response->assertStatus(200);
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
