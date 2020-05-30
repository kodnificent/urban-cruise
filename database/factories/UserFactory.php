<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\FileManager;
use App\User;
use App\UserProfile;
use Faker\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->afterCreating(User::class, function ($user, $faker) {

    $files = FileManager::all();
    $image = $files->count() === 0 ? null : $files->random(1)->first();

    $profile = new UserProfile([
        'job_title' => 'Content Creator',
        'company' => 'Urban Cruise',
        'about' => Factory::create()->text(300),
        'facebook' => 'https://facebook.com',
        'twitter' => 'https://twitter.com',
        'linkedin' => 'https://linkedin.com',
        'website' => 'https://urbancruise.com',
        'photo' => $image->url,
    ]);

    $user->profile()->save($profile);
});
