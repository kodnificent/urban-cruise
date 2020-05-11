<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    $roles = collect([
        'Author', // can create only
        'Editor', // can edit only
    ]);

    return [
        'title' => $roles->random()->first(),
        'description' => $faker->words(7, true),
        'access_admin' => true
    ];
});
