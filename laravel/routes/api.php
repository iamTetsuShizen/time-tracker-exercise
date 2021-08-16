<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('tasks/', '\App\Http\Controllers\TaskController@getTasks')->name('get-tasks');

Route::post('task/store', '\App\Http\Controllers\TaskController@store')->name('store-task');
Route::delete('task/delete/{taskID}', '\App\Http\Controllers\TaskController@delete')->name('delete-task');

