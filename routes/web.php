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

Route::get('home.shell', 'HomeController@shell')->name('home.shell');

Route::get('category.shell', 'CategoryController@shell')->name('category.shell');

Route::get('post.shell', 'PostController@shell')->name('post.shell');

Route::get('author.shell', 'AuthorController@shell')->name('author.shell');

Route::get('', 'HomeController')->name('home');

Route::prefix('author')
    ->name('author.')
    ->group(function () {
        Route::get('{id}', 'AuthorController@read')->name('read');
    });

Route::prefix('posts')
    ->name('category.')
    ->group(function () {
        Route::get('{category?}/{sub_category?}', 'PostController@list')->name('posts');
    });

Route::prefix('/{category}')
    ->name('category.')
    ->group(function () {
        Route::get('{sub_category?}', 'CategoryController@show')->name('show');

        Route::get('{sub_category}/{slug}', 'PostController@read')->name('post');
    });
