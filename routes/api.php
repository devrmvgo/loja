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

//--------------------CIDADES-------------------------------
Route::options('/cidades/{uf}', 'CidadesController@listCidadesByUf');

//--------------------ENDEREÇOS-----------------------------
Route::post('/empresas/enderecos/{id}', 'EnderecosController@createByEmpresaId');
Route::post('/clientes/enderecos/{id}', 'EnderecosController@createByClienteId');
Route::get('/empresas/enderecos/{id}', 'EnderecosController@listByEmpresaId');
Route::get('/clientes/enderecos/{id}', 'EnderecosController@listByCLienteId');
Route::put('/enderecos/{id}', 'EnderecosController@update');
Route::put('/enderecos/ativo/{id}', 'EnderecosController@updateAtivo');
Route::put('/empresas/enderecos/ativo/{id}', 'EnderecosController@updateAtivoByEmpresaId');
Route::put('/clientes/enderecos/ativo/{id}', 'EnderecosController@updateAtivoByCLienteId');

//--------------------PRDUTOS-----------------------------
Route::post('/empresas/produtos/{id}', 'ProdutosController@createByEmpresaId');
Route::get('/produtos', 'ProdutosController@list');
Route::get('/empresas/produtos/{id}', 'ProdutosController@listByEmpresaId');
Route::put('/produtos/{id}', 'ProdutosController@update');
Route::put('/produtos/ativo/{id}', 'ProdutosController@updateAtivo');
Route::put('/empresas/produtos/ativo/{id}', 'ProdutosController@updateAtivoByEmpresaId');

//--------------------CLIENTES------------------------------
Route::post('/empresas/clientes/{id}', 'ClientesController@createByEmpresaId');
Route::get('/clientes', 'ClientesController@list');
Route::get('/empresas/clientes/{id}', 'ClientesController@listByEmpresaId');
Route::put('/clientes/{id}', 'ClientesController@update');
Route::put('/clientes/ativo/{id}', 'ClientesController@updateAtivo');
Route::put('/empresas/clientes/ativo/{id}', 'ClientesController@updateAtivoByEmpresaId');


