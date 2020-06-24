<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PostCategory;
use Faker\Generator as Faker;

$factory->define(PostCategory::class, function (Faker $faker) {
    return [
        'title' =>  $faker->words(3, true),
        //'description' => $faker->text(100)
    ];
});


$factory->state(PostCategory::class, 'news', [
    'title' => 'news'
]);
