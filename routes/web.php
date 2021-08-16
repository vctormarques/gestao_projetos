<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', ['as' => 'index', 'uses' => 'ProjetosController@index']);
Route::get('/projeto/{id}', ['as' => 'visualizar.projeto', 'uses' => 'ProjetosController@show']);
Route::post('/projeto', ['as' => 'adicionar.projeto', 'uses' => 'ProjetosController@store']);

Route::post('/adicionar-atividade', ['as' => 'adicionar.atividade', 'uses' => 'AtividadesController@store']);
Route::post('/editar-atividade', ['as' => 'editar.atividade', 'uses' => 'AtividadesController@editar']);
Route::post('/concluir-atividade', ['as' => 'concluir.atividade', 'uses' => 'AtividadesController@concluir']);
Route::post('/excluir-atividade', ['as' => 'excluir.atividade', 'uses' => 'AtividadesController@excluir']);
