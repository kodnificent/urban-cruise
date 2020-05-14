<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\FileManager;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $files = FileManager::all();
    $image = $files->count() === 0 ? null : $files->random(1)->first();

    return [
        'title' =>  $faker->words(3, true),
        'summary' => $faker->text(),
        'content' => $faker->realText(800, 5),
        'file_id' => optional($image)->id,
        'options'   =>  [
            'allow_comments'    =>  true,
            'allow_sharing'     =>  true
        ],
        'author_id' => 1
    ];
});

$factory->state(Post::class, 'published', [
    'status'    =>  'published',
]);

$factory->state(Post::class, 'draft', [
    'status'    =>  'draft',
]);

$factory->state(Post::class, 'featured', [
    'featured'    =>  true,
]);
