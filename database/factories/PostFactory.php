<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' =>  $faker->words(3, true),
        'summary' => $faker->text(),
        'content' => $faker->text(200, 5),
        'options'   =>  [
            'allow_comments'    =>  true,
            'allow_sharing'     =>  true
        ],
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
