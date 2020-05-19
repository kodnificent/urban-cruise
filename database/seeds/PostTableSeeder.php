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
            'category_id' =>  rand(2, 6) // new category
        ]);

        factory(Post::class)->states(['published', 'featured'])->create([
            'category_id' =>  rand(8, 13) // entertainment category
        ]);

        factory(Post::class)->states(['published', 'featured'])->create([
            'category_id' =>  rand(15, 17) // sports category
        ]);

        factory(Post::class)->states(['published', 'featured'])->create([
            'category_id' =>  rand(19, 26) // lifestyle category
        ]);

        // published
        factory(Post::class, 10)->state('published')->create([
            'category_id' =>  rand(2, 6) // new category
        ]);

        factory(Post::class, 10)->state('published')->create([
            'category_id' =>  rand(8, 13) // entertainment category
        ]);

        factory(Post::class, 10)->state('published')->create([
            'category_id' =>  rand(15, 17) // sports category
        ]);

        factory(Post::class, 10)->state('published')->create([
            'category_id' =>  rand(19, 26) // lifestyle category
        ]);

        // drafts
        factory(Post::class, 3)->state('draft')->create([
            'category_id' =>  rand(2, 6) // new category
        ]);

        factory(Post::class, 5)->state('draft')->create([
            'category_id' =>  rand(8, 13) // entertainment category
        ]);

        factory(Post::class, 1)->state('draft')->create([
            'category_id' =>  rand(15, 17) // sports category
        ]);

        factory(Post::class, 5)->state('draft')->create([
            'category_id' =>  rand(19, 26) // lifestyle category
        ]);
    }

    /**
     * select a random news category
     *
     * @return int
     */
    protected function news()
    {
        //
    }
}
