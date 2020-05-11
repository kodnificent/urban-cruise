<?php

namespace Tests\Unit;

use App\PostCategory;
use App\Traits\HasMeta;
use Tests\ModelTestCase;
use Tests\Utils\Model\TestsModelSlug;
use Tests\Utils\Model\TestsModelTimestamp;
use Tests\Utils\Model\TestsModelTrait;

class PostCategoryTest extends ModelTestCase
{
    use TestsModelTrait,
        TestsModelSlug,
        TestsModelTimestamp;

    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function requiredColumns(): array
    {
        return [
            'id', 'parent_id', 'slug', 'title', 'description'
        ];
    }

    protected function requiredTraits(): array
    {
        return [
            HasMeta::class,
        ];
    }

    protected function shouldBeTimestamped()
    {
        return false;
    }

    public function slugColumnShouldReturn()
    {
        return 'slug';
    }

    public function slugMirrorShouldReturn()
    {
        return 'title';
    }

    public function testCategorySeeding()
    {
        $this->artisan('db:seed', [
            '--class' => 'CategoryTableSeeder'
        ]);

        $this->assertDatabaseHas($this->databaseTableName(), [
            'slug' => 'news',
            'slug' => 'entertainment',
            'slug' => 'sports',
            'slug' => 'lifestyle'
        ]);
    }

    public function testParentCategoriesScope_ShouldReturn_ParentCategories()
    {
        $this->artisan('db:seed', [
            '--class' => 'CategoryTableSeeder'
        ]);

        $parent_categories = PostCategory::parentCategories();
        $this->assertGreaterThan(0, $parent_categories->count());
    }

    public function testChildCategoriesScope_ShouldReturn_ChildCategories()
    {
        $this->artisan('db:seed', [
            '--class' => 'CategoryTableSeeder'
        ]);

        $parent_categories = PostCategory::childCategories();
        $this->assertGreaterThan(0, $parent_categories->count());
    }
}
