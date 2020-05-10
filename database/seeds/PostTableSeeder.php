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
        factory(Post::class)->states(['published', 'featured'])->create([
            'category_id' => 1
        ]);

        factory(Post::class)->states(['published', 'featured'])->create([
            'category_id' => 2
        ]);

        factory(Post::class)->states(['published', 'featured'])->create([
            'category_id' => 3
        ]);

        factory(Post::class)->states(['published', 'featured'])->create([
            'category_id' => 4
        ]);

        // published
        factory(Post::class, 10)->state('published')->create([
            'category_id' => 1
        ]);

        factory(Post::class, 10)->state('published')->create([
            'category_id' => 2
        ]);

        factory(Post::class, 10)->state('published')->create([
            'category_id' => 3
        ]);

        factory(Post::class, 10)->state('published')->create([
            'category_id' => 4
        ]);

        // drafts
        factory(Post::class, 3)->state('draft')->create([
            'category_id' => 1
        ]);

        factory(Post::class, 5)->state('draft')->create([
            'category_id' => 2
        ]);

        factory(Post::class, 1)->state('draft')->create([
            'category_id' => 3
        ]);

        factory(Post::class, 5)->state('draft')->create([
            'category_id' => 4
        ]);
    }
}
