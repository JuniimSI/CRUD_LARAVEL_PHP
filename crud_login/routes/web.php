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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('clientes', 'ClientesController@index')->middleware('auth');
Route::get('clientes/novo', 'ClientesController@novo')->middleware('auth');
Route::get('clientes/{cliente}/editar', 'ClientesController@editar')->middleware('auth');
Route::post('clientes/salvar', 'ClientesController@salvar')->middleware('auth');
Route::patch('clientes/{cliente}', 'ClientesController@atualizar')->middleware('auth');
Route::delete('clientes/{cliente}', 'ClientesController@deletar')->middleware('auth');
