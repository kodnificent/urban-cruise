<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\FileManager;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $content = "<p>{$faker->realText()}</p><p>{$faker->realText()}</p><p>{$faker->realText()}</p><p>{$faker->realText()}</p><p>{$faker->realText()}</p>";
    return [
        'title' =>  ucfirst($faker->words(rand(4, 8), true)),
        'summary' => $faker->text(rand(150, 300)),
        'content' => $content,
        'type' => 'article',
        'author_id' => rand(1, 5),
        'published_at' => now(),
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
