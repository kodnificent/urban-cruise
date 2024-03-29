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

Route::get('team', 'AuthorController@team')->name('team');

Route::get('', 'HomeController')->name('home');
Route::get('about-us', 'PageController@about')->name('about-us');
Route::get('contact-us', 'PageController@contact')->name('contact-us');
Route::get('write-for-us', 'PageController@write')->name('write-for-us');
Route::get('terms-and-condition', 'PageController@terms')->name('terms');
Route::get('disclaimer', 'PageController@disclaimer')->name('disclaimer');
Route::get('privacy-policy', 'PageController@privacy')->name('privacy');

Route::prefix('author')
    ->name('author.')
    ->group(function () {
        Route::get('{id}', 'AuthorController@read')->name('read');
    });

Route::prefix('posts')
    ->name('category.')
    ->group(function () {
        Route::get('search', 'PostController@search')->name('posts.search');

        Route::get('{category?}/{sub_category?}', 'PostController@list')->name('posts');
    });

Route::prefix('/{category}')
    ->name('category.')
    ->where([
        'category' => "^(?!nova|admin-app.*$).*"
    ])
    ->group(function () {
        Route::get('{sub_category}/{slug}', 'PostController@read')
            ->name('post');

        Route::get('{sub_category}', 'CategoryController@show')
            ->name('show.child');

        Route::get('', 'CategoryController@show')
            ->name('show');
    });
