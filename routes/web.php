<?php
use \App\Http\Controllers;
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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/aide','HelpsController@show');
//Videos Routes

Route::post('/video','VideosController@store');
Route::get('/video','VideosController@show');

Route::post('/video/{video}/comments','CommentsController@store');



Route::get('/comment','CommentsController@show');
Route::post('/comment','CommentsController@store');


Route::get('/test_admin' , 'AdminController@index');
Route::get('/test_admin/advanced' , 'AdminController@showAdvanced');
Route::get('/test_admin/video/{id}' , 'AdminController@showVideo');

Route::get('/test_admin/users' , 'AdminController@showUsers');
Route::post('/test_admin/videos/user_id' , 'AdminController@showUserVideos');
Route::get('/test_admin/corpus' , 'AdminController@generateCorpus');





