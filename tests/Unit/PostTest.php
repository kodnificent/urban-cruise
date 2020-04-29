<?php

namespace Tests\Unit;

use App\Post;
use App\PostCategory;
use App\Traits\HasAuthor;
use App\Traits\HasSlug;
use App\Traits\HasUpdater;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testDatabase_Has_ExpectedColumns()
    {
        $table = 'posts';

        $this->assertTrue(Schema::hasTable($table), "$table table does not exist");
        $this->assertTrue(Schema::hasColumn($table, 'id'), 'id column does not exist');
        $this->assertTrue(Schema::hasColumn($table, 'slug'), 'slug column does not exist');
        $this->assertTrue(Schema::hasColumn($table, 'title'), 'title column does not exist');
        $this->assertTrue(Schema::hasColumn($table, 'summary'), 'summary column does not exist');
        $this->assertTrue(Schema::hasColumn($table, 'content'), 'content column does not exist');
        $this->assertTrue(Schema::hasColumn($table, 'options'), 'options column does not exist');
        $this->assertTrue(Schema::hasColumn($table, 'status'), 'status column does not exist');
        $this->assertTrue(Schema::hasColumn($table, 'file_id'), 'file_id column does not exist');
        $this->assertTrue(Schema::hasColumn($table, 'category_id'), 'category_id column does not exist');
        $this->assertTrue(Schema::hasColumn($table, 'author_id'), 'author_id column does not exist');
        $this->assertTrue(Schema::hasColumn($table, 'updater_id'), 'updater_id column does not exist');
        $this->assertTrue(Schema::hasColumn($table, 'meta_id'), 'meta_id column does not exist');
        $this->assertTrue(Schema::hasColumn($table, 'created_at'), 'created_at column does not exist');
        $this->assertTrue(Schema::hasColumn($table, 'updated_at'), 'updated_at column does not exist');
        $this->assertTrue(Schema::hasColumn($table, 'deleted_at', 'deleted_at column does not exist'));
    }

    public function testSlugTrait()
    {
        $traits = class_uses(Post::class);

        $this->assertArrayHasKey(HasSlug::class, $traits);

        $methods = get_class_methods(Post::class);
        $this->assertContains('slugColumn', $methods);
        $this->assertContains('slugMirror', $methods);

        $this->assertEquals('slug', (new Post)->slugColumn(), 'invalid slug mirror');
        $this->assertEquals('title', (new Post)->slugMirror(), 'invalid slug mirror');
    }

    public function testSoftDeletes()
    {
        $traits = class_uses(Post::class);

        $this->assertArrayHasKey(SoftDeletes::class, $traits);
    }

    public function testCasts()
    {
        $post = new Post();

        $this->assertArrayHasKey('options', $post->getCasts(), 'cast not found');

        $this->assertEquals('array', $post->getCasts()['options'], 'invalid cast type');
    }

    public function testCategory_Relationship()
    {
        $this->assertTrue(Schema::hasTable('post_categories'), 'post_categories table does not exist ');

        $category = factory(PostCategory::class)->create();

        $post = factory(Post::class)->create([
            'category_id'   =>  $category->id
        ]);

        $this->assertInstanceOf(PostCategory::class, $post->category, 'post has no category');
    }

    public function testAuthor_Relationships()
    {
        $this->assertArrayHasKey(HasAuthor::class, class_uses(Post::class), 'author trait missing');

        $this->assertArrayHasKey(HasUpdater::class, class_uses(Post::class), 'updater trait missing');

        $author = factory(User::class)->create();

        $post = factory(Post::class)->create([
            'author_id' =>  $author->id,
            'updater_id' => $author->id,
        ]);

        $this->assertInstanceOf(User::class, $post->author, 'post has no author');
        $this->assertInstanceOf(User::class, $post->updater, 'post has no updater');
    }
}
