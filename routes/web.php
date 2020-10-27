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
Route::post('/getdata', 'ClienteController@getdata')->name('getdata');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/cadastro', function() {
    return view('formulario-cadastro');
})->name('cadastro')->middleware('auth');

Route::get('/nome-telefone', 'ClienteController@nomeTelefone')->name('nome-telefone')->middleware('auth');
Route::get('/nome-endereco', 'ClienteController@nomeEndereco')->name('nome-endereco')->middleware('auth');

Route::resource('client', 'ClienteController')->middleware('auth');
