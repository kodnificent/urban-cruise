<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('home.sk', 'HomeController@skeleton')->name('home.skeleton');

Route::get('author.sk', 'AuthorController@skeleton')->name('author.skeleton');

Route::get('posts.sk', 'PostController@skeleton')->name('posts.skeleton');

Route::get('post.sk', 'PostController@skeleton-single')->name('post.skeleton');

Route::get('', 'HomeController')->name('home');

Route::prefix('author')
    ->name('author.')
    ->group(function () {
        Route::get('{id}', 'AuthorController@read')->name('read');
    });

Route::prefix('/{category}')
    ->name('post.')
    ->group(function () {
        Route::get('{sub_category?}', 'PostController@list')->name('list');

        Route::get('{sub_category}/{slug}', 'PostController@read')->name('read');
    });
