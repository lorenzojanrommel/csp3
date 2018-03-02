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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/about', function(){
// 	return view ('pages.about');
// });

Route::get('/', 'PagesController@index');

Route::get('/about', 'PagesController@about');

Route::get('/service', 'PagesController@service');

Route::get('/posts', 'CommentsController@index');

Route::post('/comments/{id}', 'CommentsController@store');

Route::post('/edit-comment/{id}', 'CommentsController@updateComment');

Route::post('/delete-comment/{id}', 'CommentsController@destroy');

Route::resource('posts', 'PostsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'AdminController@showProfile');

Route::get('/dashboard', 'AdminController@index');

Route::get('/user-list', 'AdminController@show');

Route::post('/delete-user/{id}', 'AdminController@delete');

Route::post('/add-user', 'AdminController@store');

Route::post('/edit-user/{id}', 'AdminController@update');

Route::get('/single_post/{id}', 'AdminController@singlePost');

Route::get('/dashboard', 'AdminController@allPost');

Route::delete('/delete_post/{id}', 'AdminController@deletePost');