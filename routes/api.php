<?php

use Illuminate\Http\Request;

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
Route::put('toDo/{idToDo}', 'API\ToDoController@update');
Route::delete('toDo/{idToDo}', 'API\ToDoController@delete');
Route::post('toDo', 'API\ToDoController@store');
Route::get('toDo', 'API\ToDoController@index');

Route::apiResource('levelClass', 'API\LevelClassController');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
