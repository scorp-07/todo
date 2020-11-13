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

Route::namespace('Users')->group(function (){
    Route::get('/users', 'UserController@index');
    Route::get('/users/create', 'UserController@create');
    Route::get('/users/{user_id}/edit', 'UserController@edit');
    Route::get('/users/{user_id}', 'UserController@show');
    Route::put('/users/{user_id}', 'UserController@update');
    Route::post('/users/create', 'UserController@make');
    Route::delete('/users/{user_id}', 'UserController@destroy');
});

Route::namespace('Goals')->group(function () {
    Route::get('/goals', 'GoalController@index');
    Route::get('/goals/create', 'GoalController@create');
});
