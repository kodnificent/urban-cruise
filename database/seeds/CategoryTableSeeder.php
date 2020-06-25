<?php

use App\PostCategory;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // News
        $news = factory(PostCategory::class)->create([
            'title' => 'News'
        ]);

        factory(PostCategory::class)->create([
            'title' => 'Politics',
            'parent_id' => $news->id
        ]);

        factory(PostCategory::class)->create([
            'title' => 'Business',
            'parent_id' => $news->id
        ]);

        factory(PostCategory::class)->create([
            'title' => 'Health',
            'parent_id' => $news->id
        ]);

        factory(PostCategory::class)->create([
            'title' => 'Techs and Gadget',
            'parent_id' => $news->id
        ]);

        factory(PostCategory::class)->create([
            'title' => 'Celebrity Gossip',
            'parent_id' => $news->id
        ]);

        // entertainment
        $entertainment = factory(PostCategory::class)->create([
            'title' => 'Entertainment'
        ]);

        factory(PostCategory::class)->create([
            'title' => 'TV Shows',
            'parent_id' => $entertainment->id
        ]);

        factory(PostCategory::class)->create([
            'title' => 'Movies',
            'parent_id' => $entertainment->id
        ]);

        factory(PostCategory::class)->create([
            'title' => 'Books',
            'parent_id' => $entertainment->id
        ]);

        factory(PostCategory::class)->create([
            'title' => 'Music',
            'parent_id' => $entertainment->id
        ]);

        factory(PostCategory::class)->create([
            'title' => 'Comedy',
            'parent_id' => $entertainment->id
        ]);

        factory(PostCategory::class)->create([
            'title' => 'Games',
            'parent_id' => $entertainment->id
        ]);

        // sports
        $sports = factory(PostCategory::class)->create([
            'title' => 'Sports'
        ]);

        factory(PostCategory::class)->create([
            'title' => 'Football',
            'parent_id' => $sports->id
        ]);

        factory(PostCategory::class)->create([
            'title' => 'Tennis',
            'parent_id' => $sports->id
        ]);

        factory(PostCategory::class)->create([
            'title' => 'Basketball',
            'parent_id' => $sports->id
        ]);

        // lifestyle
        $lifestyle = factory(PostCategory::class)->create([
            'title' => 'Lifestyle',
        ]);

        factory(PostCategory::class)->create([
            'title' => 'Styles & Beauty',
            'parent_id' => $lifestyle->id
        ]);

        factory(PostCategory::class)->create([
            'title' => 'Fashion',
            'parent_id' => $lifestyle->id
        ]);

        factory(PostCategory::class)->create([
            'title' => 'Travels',
            'parent_id' => $lifestyle->id
        ]);

        factory(PostCategory::class)->create([
            'title' => 'Frugal Living',
            'parent_id' => $lifestyle->id
        ]);

        factory(PostCategory::class)->create([
            'title' => 'Life Hacks',
            'parent_id' => $lifestyle->id
        ]);

        factory(PostCategory::class)->create([
            'title' => 'Food',
            'parent_id' => $lifestyle->id
        ]);

        factory(PostCategory::class)->create([
            'title' => 'Culture',
            'parent_id' => $lifestyle->id
        ]);

        factory(PostCategory::class)->create([
            'title' => 'Fitness and Body Building',
            'parent_id' => $lifestyle->id
        ]);
    }
}
