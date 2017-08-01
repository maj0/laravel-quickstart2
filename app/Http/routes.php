<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    })->middleware('guest');

    Route::get('/about-us', function () {
        return view('about');
    })->middleware('guest');

    Route::get('/tasks', 'TaskController@index');
    Route::get('/task', 'TaskController@create');
    Route::post('/task', 'TaskController@store');
    Route::get('/task/show/{task}', 'TaskController@show');
    Route::post('/task/show/{task}', 'TaskController@show');
    Route::post('/task/edit/{task}', 'TaskController@edit');
    Route::post('/task/update/{task}', 'TaskController@update');
    Route::delete('/task/{task}', 'TaskController@destroy');
    
    Route::get('/dashboard', 'TaskController@dashboard');
    Route::get('/contact', function () {
        return view('contact');

    });
    Route::post('/contact', 'ContactController@store');
    
    Route::get('change-password', function () {
        return view('auth.change-password');

    });
    Route::post('change-password', 'Auth\UpdatePasswordController@update');

    Route::auth();

});
