<?php

header('Access-Control-Allow-Origin: http://localhost:3000');
header('Access-Control-Allow-Headers: origin, x-requested-with, content-type');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
    //return $request->user();
//});

//Route::get('/autor/listar/{page}/{size}/{dir}/{props}', 'Rest\AutorRestController@index');

Route::get('/autor/listar', 'Rest\AutorRestController@index');

Route::get('/usuario/listar', 'Rest\UserRestController@index');

Route::post('/autor/salvar','Rest\AutorRestController@create');

Route::get('/autor/alterar/{id}','Rest\AutorRestController@update');

Route::post('/autor/update/{id}','Rest\AutorRestController@save');


// Route::get('/autor/excluir/{id}','Rest\AutorRestController@delete');
// Route::get('/autor/consultar/{id}','Rest\AutorRestController@view');

// Route::post('/autor/update/{id}','Rest\AutorRestController@save');
// Route::post('/autor/excluir/{id}','Rest\AutorRestController@excluir');
