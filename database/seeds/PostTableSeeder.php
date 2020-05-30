<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // featured
        factory(Post::class, 2)->states(['published', 'featured'])->create()->each(function ($post) {
            $post->category_id = rand(2, 6);
            $post->save();
        });

        factory(Post::class, 2)->states(['published', 'featured'])->create()->each(function ($post) {
            $post->category_id = rand(8, 13);
            $post->save();
        });

        factory(Post::class, 2)->states(['published', 'featured'])->create()->each(function ($post) {
            $post->category_id = rand(15, 17);
            $post->save();
        });

        factory(Post::class, 2)->states(['published', 'featured'])->create()->each(function ($post) {
            $post->category_id = rand(19, 26);
            $post->save();
        });


        // published
        factory(Post::class, 30)->states(['published'])->create()->each(function ($post) {
            $post->category_id = rand(2, 6);
            $post->save();
        });

        factory(Post::class, 30)->states(['published'])->create()->each(function ($post) {
            $post->category_id = rand(8, 13);
            $post->save();
        });

        factory(Post::class, 30)->states(['published'])->create()->each(function ($post) {
            $post->category_id = rand(15, 17);
            $post->save();
        });

        factory(Post::class, 30)->states(['published'])->create()->each(function ($post) {
            $post->category_id = rand(19, 26);
            $post->save();
        });

        // drafts
        factory(Post::class, 3)->states(['draft'])->create()->each(function ($post) {
            $post->category_id = rand(2, 6);
            $post->save();
        });

        factory(Post::class, 5)->states(['draft'])->create()->each(function ($post) {
            $post->category_id = rand(8, 13);
            $post->save();
        });

        factory(Post::class, 1)->states(['draft'])->create()->each(function ($post) {
            $post->category_id = rand(15, 17);
            $post->save();
        });

        factory(Post::class, 5)->states(['draft'])->create()->each(function ($post) {
            $post->category_id = rand(19, 26);
            $post->save();
        });
    }
}
