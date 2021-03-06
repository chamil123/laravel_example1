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
Route::get('/task',function (){
    $data=App\Task::all();

return view('tasks')->with('tasks',$data);
});
Route::post('/saveTask','TaskController@store');
Route::get('/markascompleted/{id}','TaskController@updateTaskAsCompleted');
Route::get('/markasnotcompleted/{id}','TaskController@updateTaskAsNotCompleted');
Route::get('/deleteTask/{id}','TaskController@deleteTask');
Route::get('/updatetask/{id}','TaskController@updateTaskview');
Route::post('/updatetasks','TaskController@updatetask');
