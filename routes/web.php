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

// Homepage
Route::get('/', function () {
    return view('homepage');
})->name('homepage');

// Posts
Route::get('posts', 'PostsController@index')->name('posts.user.index');
Route::get('posts/{slug}', 'PostsController@show')->name('posts.user.show');

// Tags
Route::get('posts/tag/{tag}', 'PostsController@tag')->name('posts.user.tag');

// Categories
Route::get('posts/category/{category}', 'PostsController@category')->name('posts.user.category');

// Administration
Route::group(['namespace' => 'Admin'], function () {
    // Posts
    Route::resource('admin/posts', 'PostsController');
    // Categories
    Route::resource('admin/categories', 'CategoriesController');
    // Tags
    Route::resource('admin/tags', 'TagsController');
    // Administration
    Route::resource('admin/home', 'HomeController');
});
