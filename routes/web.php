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
    return view('user.home');
});

Route::get('/', 'UserController@home')->name('users.home');
Route::get('/cadastro', 'UserController@create')->name('users.create');
Route::get('/logout', 'UserController@logout')->name('users.logout');


Route::post('/cadastro/store', 'UserController@store')->name('users.store');
Route::post('/login', 'UserController@login')->name('users.login');

Route::get('/tarefa/finalizar', 'TaskController@showEndForm')->name('tasks.endForm');
Route::post('/tarefa/finalizar/{id}', 'TaskController@end')->name('tasks.end');

Route::get('/tarefa/nova/', 'TaskController@create')->name('tasks.create');

Route::post('/tarefa/nova/new', 'TaskController@new')->name('tasks.new');

Route::delete('/tarefa/delete/', 'TaskController@delete')->name('tasks.delete');
