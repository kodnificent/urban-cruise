<?php

namespace Tests\Feature;

use App\Post;
use App\PostCategory;
use App\Traits\HasSlug;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class PostCategoryTest extends TestCase
{
    use RefreshDatabase, WithFaker;


    public function testPostCategory_Has_DatabaseColumns()
    {
        $table = 'post_categories';

        $this->assertTrue(Schema::hasTable($table), "$table table does not exist");
        $this->assertTrue(Schema::hasColumn($table, 'id'), 'id column does not exist');
        $this->assertTrue(Schema::hasColumn($table, 'slug'), 'slug column does not exist');
        $this->assertTrue(Schema::hasColumn($table, 'title'), 'title column does not exist');
        $this->assertTrue(Schema::hasColumn($table, 'description'), 'description column does not exist');
        $this->assertTrue(Schema::hasColumn($table, 'file_id'), 'file_id column does not exist');
        $this->assertTrue(Schema::hasColumn($table, 'meta_id'), 'meta_id column does not exist');
    }

    public function testModel_ShouldNot_Use_Timestamps()
    {
        $this->assertFalse((new PostCategory)->timestamps);
    }

    public function testSlugTrait()
    {
        $traits = class_uses(PostCategory::class);

        $this->assertArrayHasKey(HasSlug::class, $traits);

        $methods = get_class_methods(PostCategory::class);
        $this->assertContains('slugColumn', $methods);
        $this->assertContains('slugMirror', $methods);

        $this->assertEquals('slug', (new PostCategory)->slugColumn(), 'invalid slug mirror');
        $this->assertEquals('title', (new PostCategory)->slugMirror(), 'invalid slug mirror');
    }

    public function testPost_Relationship()
    {
        $this->assertTrue(Schema::hasTable('posts'), 'post table does not exist ');

        $category = factory(PostCategory::class)->create();

        $post = factory(Post::class)->create([
            'category_id'   =>  $category->id
        ]);

        $this->assertCount(1, $category->posts, 'invalid count of posts for the category');

        $this->assertInstanceOf(Post::class, $category->posts->first(), 'category probably has no post');
    }
}
