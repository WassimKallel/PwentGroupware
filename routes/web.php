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
|
*/
Route::get('/', function () {
    return view('welcome');

});

Route::get('/projects', 'ProjectController@index');
Route::post('/projects', 'ProjectController@store');
Route::get('/projects/create', 'ProjectController@create');
Route::get('/projects/{id}', 'ProjectController@show');



Auth::routes();

Route::get('/home', 'HomeController@index');
