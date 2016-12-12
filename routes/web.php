<?php
use App\Http\Controllers;
use App\Http\Middleware\CheckProjectAdmin;
use App\Http\Middleware\CheckAdmin;
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

Route::group(['middleware' => 'auth'], function () {
	Route::get('/', function () {
	    return Redirect(action('ProjectController@index'));
	});
	
	Route::get('/projects', 'ProjectController@index');
	Route::post('/projects', 'ProjectController@store');
	
	Route::get('/projects/create', 'ProjectController@create');
	
	Route::get('/projects/{id}', [ 'as' => 'project.home' , 'uses' => 'ProjectController@show']);

	Route::get('/projects/{id}/edit', 'ProjectController@edit')->middleware(CheckProjectAdmin::class);;

	Route::post('/projects/{id}/update', 'ProjectController@update');

	Route::get('/projects/{id}/posts', 'PostController@index');
	Route::post('/projects/{id}', [ 'as' => 'project.update' , 'uses' => 'ProjectController@update']);
	
	Route::get('/projects/{id}/files','FilesController@index');
	Route::get('/projects/{id}/files/create','FilesController@create');
	Route::post('/projects/{id}/files/create','FilesController@store');
	Route::get('/projects/{id}/files/{file_id}','FilesController@show');
	Route::get('/projects/{id}/files/{file_id}/download','FilesController@download');

	Route::get('/projects/{id}/tasks','TaskController@index');
	Route::post('/projects/{id}/tasks', [ 'as' => 'task.store' , 'uses' => 'TaskController@store']);
	Route::post('/projects/{id}/tasks/update', [ 'as' => 'task.update' , 'uses' => 'TaskController@update']);
	
	Route::get('/projects/{id}/calendar','CalendarController@index');
	
	Route::get('/posts/{id}', 'PostController@show');
	Route::post('/posts/{id}', 'CommentController@store');
	
	
	Route::get('/profile','UserController@index');
	Route::post('/profile','UserController@update_avatar');
	Route::get('/profile/{id}','UserController@show');

	Route::group(['prefix' => 'messages'], function () {
	    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
	    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
	    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
	    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
	    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
	});
});

Route::group(['middleware' => ['web']], function() {

// Login Routes...
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
    Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Registration Routes...


// Password Reset Routes...
    Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);
});

	
Route::group(['prefix' => 'admin' , 'middleware' => CheckAdmin::class], function () {
    Route::get('/addUser', ['as' => 'admin.addUserForm', 'uses' => 'AdminController@showAddUserForm']); 
    Route::post('/addUser', ['as' => 'admin.addUser', 'uses' => 'AdminController@addUser']);
});

Route::get('/home', function () {
	    return Redirect(action('ProjectController@index'));
	});
