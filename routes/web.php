<?php
use App\Http\Controllers;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|create
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/projects', 'ProjectController@index');
Route::post('/projects', 'ProjectController@store');
Route::get('/projects/create', 'ProjectController@create');
Route::get('/projects/{id}', 'ProjectController@show');
Route::post('/projects/{id}', 'PostController@store');
Route::post('/projects/post/{id}', 'CommentController@store');

Route::get('/profile','UserController@index');
Route::get('/profile/{id}','UserController@show');
Route::post('/profile','UserController@update_avatar');


Route::get('/projects/main/{id}', 'ProjectController@main');


Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});


Auth::routes();

Route::get('/home', 'HomeController@index');
