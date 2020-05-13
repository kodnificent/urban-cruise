<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Facades\Thumbnailer;
use App\FileManager;
use Faker\Generator as Faker;

$factory->define(FileManager::class, function(Faker $faker){
    return [
        //
    ];
});

$factory->afterMaking(FileManager::class, function($image){
    Thumbnailer::makeMany(Thumbnailer::keys(), $image->path, $image->disk);
});
