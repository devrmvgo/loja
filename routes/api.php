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

//--------------------EMPRESAS------------------------------
Route::post('/empresas', 'EmpresasController@create');
Route::get('/empresas', 'EmpresasController@list');
Route::put('/empresas/{id}', 'EmpresasController@update');
Route::put('/empresas/ativo/{id}', 'EmpresasController@updateAtivo');
Route::delete('/empresas/{id}','EmpresasController@delete');

//--------------------CIDADES-------------------------------
Route::options('/cidades/{uf}', 'CidadesController@listCidadesByUf');

//--------------------ENDEREÇOS-----------------------------
Route::post('/empresas/enderecos/{id}', 'EnderecosController@createByEmpresaId');
Route::get('/empresas/enderecos/{id}', 'EnderecosController@listByEmpresaId');
Route::put('/enderecos/{id}', 'EnderecosController@update');
Route::put('/enderecos/ativo/{id}', 'EnderecosController@updateAtivo');
Route::delete('/enderecos/{id}','EnderecosController@delete');

//--------------------PRDUTOS-----------------------------
Route::post('/empresas/produtos/{id}', 'ProdutosController@createByEmpresaId');
Route::get('/produtos', 'ProdutosController@list');
Route::get('/empresas/produtos/{id}', 'ProdutosController@listByEmpresaId');
Route::put('/produtos/{id}', 'ProdutosController@update');
Route::put('/produtos/ativo/{id}', 'ProdutosController@updateAtivo');
Route::delete('/produtos/{id}','ProdutosController@delete');



