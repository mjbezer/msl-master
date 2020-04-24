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

Route::get('/clientes','ClienteController@index');
Route::get('/cliente/create','ClienteController@create');
Route::post('/cliente/store','ClienteController@store');
Route::get('/cliente/{id}/edit','ClienteController@edit');
Route::put('/cliente/{id}/update','ClienteController@update');
Route::get('/cliente/{id}/show','ClienteController@show');
Route::get('/cliente/{id}/destroy','ClienteController@destroy');


Route::get('/contatos','ContatoController@index');
Route::get('/contato/{cliente}/create','ContatoController@create');
Route::post('/contato/store','ContatoController@store');
Route::get('/contato/{id}/edit','ContatoController@edit');
Route::put('/contato/{id}/updtae','ContatoController@update');
Route::get('/contato/{id}/show','ContatoController@;show');
Route::get('/contato/{id}/destroy','ContatoController@destroy');


Route::get('/equipamentos','EquipamentoController@index');
Route::get('/equipamento/{cliente}/create','EquipamentoController@create');
Route::post('/equipamento/store','EquipamentoController@store');
Route::get('/equipamento/{id}/edit','EquipamentoController@edit');
Route::put('/equipamento/{id}/updtae','EquipamentoController@update');
Route::get('/equipamento/{id}/show','EquipamentoController@;show');
Route::get('/equipamento/{id}/destroy','EquipamentoController@destroy');


Route::get('atendimentos','AtendimentoController@index');
Route::get('atendimento/create','AtendimentoController@create');
Route::post('atendimento/store','AtendimentoController@store');
Route::get('atendimento/{id}/edit','AtendimentoController@edit');
Route::put('atendimento/{id}/updtae','AtendimentoController@update');
Route::get('atendimento/{id}/show','AtendimentoController@;show');
Route::get('atendimento/{id}/destroy','AtendimentoController@destroy');
