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
    Route::get('/goals/{goal_id}/edit', 'GoalController@edit');
    Route::post('/goals/store', 'GoalController@store');
    Route::put('/goals/{goal_id}', 'GoalController@update');
    Route::delete('/goals/{goal_id}', 'GoalController@destroy');
});

Route::namespace('Tasks')->group(function () {
    Route::get('/tasks/{task_id}/edit', 'TaskController@edit');
    Route::get('/tasks/create', 'TaskController@create');
    Route::post('/tasks', 'TaskController@store');
    Route::put('/tasks/{task_id}', 'TaskController@update');
    Route::delete('/tasks/{task_id}', 'TaskController@destroy');
});
