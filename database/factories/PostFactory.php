<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\FileManager;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $files = FileManager::all();
    $image = $files->count() === 0 ? null : $files->random(1)->first();
    $content = "<p>{$faker->realText()}</p><p>{$faker->realText()}</p><p>{$faker->realText()}</p><p>{$faker->realText()}</p><p>{$faker->realText()}</p>";
    return [
        'title' =>  ucfirst($faker->words(rand(4, 8), true)),
        'summary' => $faker->text(rand(150, 300)),
        'content' => $content,
        'file_id' => optional($image)->id,
        'options'   =>  [
            'allow_comments'    =>  true,
            'allow_sharing'     =>  true
        ],
        'author_id' => rand(1, 5)
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
