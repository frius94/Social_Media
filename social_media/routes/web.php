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

use Illuminate\Support\Facades\Route;

Route::get('/', 'PagesController@index');

Route::get('/profile/{id}', 'ProfileController@show')->name('profile')->middleware('verified');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index');

Route::get('/removeFriend/{id1}/{id2}', 'Person_has_personController@destroy');

Route::resource('post', 'PostController');

Route::resource('comment', 'CommentController');


Route::post('/post/{id}/delete', 'PostController@destroy');

Route::post('/comment/{id}/{URL}/delete', 'CommentController@destroy');

Route::post('/profile/', 'ProfileController@update')->name('updateProfile');

Route::get('autocomplete', 'AutoCompleteController@search')->name('autocomplete');

Route::get('addFriend/{id}', 'Person_has_personController@store')->name('addFriend');

Route::post('profile/addFriend/{id}/{accept}', 'Person_has_personController@acceptFriend');

Route::post('likePost', 'LikePostController@storeAndDelete');
