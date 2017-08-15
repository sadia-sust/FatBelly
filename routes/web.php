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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('blog', 'postController@index')->name('blog');
Route::get('profile', 'HomeController@profile')->name('profile');

Route::get('compare', 'postController@compare')->name('compare');
Route::get('compareuser/{id}', 'postController@compareuser')->name('compareuser');


Route::get('createBlog', 'postController@create')->name('blog_create');
Route::post('createBlog', 'postController@store')->name('blog_store');
Route::get('deleteBlog/{id}', 'postController@delete')->name('blog_delete');
Route::get('editBlog/{id}', 'postController@edit')->name('blog_edit');
Route::put('editBlog/{id}', 'postController@update')->name('blog_update');


Route::get('home', 'HomeController@index')->name('home');
Route::get('food', 'HomeController@foodList')->name('food');
Route::get('create', 'HomeController@create')->name('create');
Route::post('create', 'HomeController@store')->name('store');

Route::get('createUser', 'HomeController@userCreate')->name('user_create');
Route::post('createUser', 'HomeController@userStore')->name('user_store');
Route::post('createweight', 'HomeController@weightUpdate')->name('weight_store');



Route::get('edit/{id}', 'HomeController@edit')->name('edit');
Route::put('edit/{id}', 'HomeController@update')->name('update');
Route::get('delete/{id}', 'HomeController@delete')->name('delete');


Route::get('blog/details/{id}','PostController@viewblog')->name('blog.details');
Route::get('post/upvote/{id}','PostController@upvote')->name('post.upvote');
Route::get('post/downvote/{id}','PostController@downvote')->name('post.downvote');
  Route::post('post/{_id}/comment', 'PostController@comment')->name('post.comment');
