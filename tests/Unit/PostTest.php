<?php

namespace Tests\Unit;

use App\Post;
use App\PostCategory;
use App\Traits\HasCreator;
use App\Traits\HasMeta;
use App\Traits\HasUpdater;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tests\ModelTestCase;
use Tests\Utils\Model\TestsModelCast;
use Tests\Utils\Model\TestsModelConstants;
use Tests\Utils\Model\TestsModelSlug;
use Tests\Utils\Model\TestsModelTrait;

class PostTest extends ModelTestCase
{
    use TestsModelTrait, TestsModelCast, TestsModelSlug, TestsModelConstants;

    protected function requiredCasts(): array
    {
        return [
            ['featured', 'boolean'],
            ['allow_comments', 'boolean']
        ];
    }

    protected function requiredTraits(): array
    {
        return [
            SoftDeletes::class,
            HasCreator::class,
            HasUpdater::class,
        ];
    }

    protected function requiredColumns(): array
    {
        return [
            'id', 'slug', 'title', 'summary', 'content', 'allow_comments', 'status',
            'featured', 'image', 'video', 'type', 'category_id', 'author_id', 'updater_id',
            'created_at', 'updated_at', 'deleted_at'
        ];
    }

    protected function slugColumnShouldReturn()
    {
        return 'slug';
    }

    protected function slugMirrorShouldReturn()
    {
        return 'title';
    }

    public function requiredConstants(): array
    {
        return [
            ['HAS_CREATOR_FOREIGN', 'author_id'],
            ['HAS_UPDATER_FOREIGN', 'updater_id']
        ];
    }

    public function testPublishedScope_ShouldReturn_PublishedPosts()
    {
        $this->artisan('db:seed', [
            '--class' => 'PostTableSeeder'
        ]);

        $posts = Post::published();
        $this->assertGreaterThan(0, $posts->count());
    }

    public function testDraftScope_ShouldReturn_DraftPosts()
    {
        $this->artisan('db:seed', [
            '--class' => 'PostTableSeeder'
        ]);

        $posts = Post::drafted();
        $this->assertGreaterThan(0, $posts->count());
    }

    public function testOfCategory_ShouldReturn_Posts()
    {
        // first we create a news (parent) and politics category (child)
        $news_cat = factory(PostCategory::class)->state('news')->create();

        $politics_cat = factory(PostCategory::class)->create([
            'title' => 'Politics',
            'parent_id' => $news_cat->id,
        ]);

        // next we create a post and assign the child category
        factory(Post::class)->create([
            'category_id' => $politics_cat->id
        ]);

        // we want to test if the scope method sees the post we created
        // as a news category although we assigned politics to it
        $news = Post::ofCategory($news_cat)->get();
        $this->assertCount(1, $news, 'no news category');

        // we also want to test if the scope method sees the post
        // as a politics category
        $politics = Post::ofCategory($politics_cat)->get();
        $this->assertCount(1, $politics, 'no politics category');
    }
}
