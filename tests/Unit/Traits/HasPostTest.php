<?php

namespace Tests\Unit\Traits;

use App\Post;
use App\Traits\HasPost;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\Models\HasPostModel;
use Tests\TestCase;

class HasPostTest extends TestCase
{
    public function testShouldLoadWithPosts_WithFalse()
    {
        $post_stub = $this->createPartialMock(HasPostModel::class, ['getLoadWithPosts']);
        $post_stub->method('getLoadWithPosts')
            ->willReturn(false);

        $this->assertSame(false, $post_stub->shouldLoadWithPosts());
    }

    public function testShouldLoadWithPosts_WithTrue()
    {
        $post_stub = $this->createPartialMock(HasPostModel::class, ['getLoadWithPosts']);
        $post_stub->method('getLoadWithPosts')
            ->willReturn(true);

        $this->assertSame(true, $post_stub->shouldLoadWithPosts());
    }

    public function testLoadWithPosts_WithFalse()
    {
        $post_stub = new class extends Model
        {
            use HasPost;

            const LOAD_WITH_POSTS = false;
        };

        $this->assertSame(false, $post_stub->getLoadWithPosts());
    }

    public function testLoadWithPosts_WithTrue()
    {
        $post_stub = new class extends Model
        {
            use HasPost;

            const LOAD_WITH_POSTS = true;
        };

        $this->assertSame(true, $post_stub->getLoadWithPosts());
    }

    public function testGetHasPostRelatedClass_ShouldReturn_PostClass()
    {
        $this->assertSame((new HasPostModel)->getHasPostRelatedClass(), Post::class);
    }

    public function testGetHasPostForeign_WithNull()
    {
        $post_stub = new HasPostModel();
        $this->assertNull($post_stub->getHasPostForeign());
    }

    public function testGetHasPostForeign_WithValue()
    {
        $post_stub = new class extends Model
        {
            use HasPost;

            const HAS_POST_FOREIGN = 'created_by';
        };

        $this->assertSame('created_by', $post_stub->getHasPostForeign());
    }

    public function testPosts_ShouldReturn_InstanceOf_HasMany()
    {
        $post_stub = $this->createPartialMock(HasPostModel::class, ['getHasPostForeign']);
        $post_stub->method('getHasPostForeign')
            ->willReturn(null);
        $this->assertInstanceOf(HasMany::class, $post_stub->posts());
    }
}
