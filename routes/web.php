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

Route::get('/delete/{id}', 'TodosController@destroy');

Route::get('/update/{id}', 'TodosController@update');

Route::post('/store-todo', 'TodosController@store');
 
Route::post('/edit-todo/{$id}',[
'uses' => 'TodosController@edit',
'as' => 'edit.todo'

]);

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
