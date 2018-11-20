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
Route::get('posts', 'PostsController@index')->name('posts');

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
