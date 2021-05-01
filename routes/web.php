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


Route::get('/imagem/{imagem}', 'ImageController@getImages')->name('imagem.get');
Route::get('/thumbnail/{imagem}', 'ImageController@getThumbnail')->name('thumbnail.get');
Route::post('/store','ImageController@store')->name('imagem.store');
Route::post('/imagem/excluir','ImageController@excluir')->name('imagem.excluir');



Route::get('/usuario/listar', 'UserController@index')->name('usuario.listar');
Route::get('/usuario/cancelar', 'UserController@cancel')->name('usuario.cancelar');
Route::get('/usuario/incluir', 'UserController@new')->name('usuario.incluir');
Route::get('/usuario/alterar/{id}','UserController@update')->name('usuario.update');
Route::post('/usuario/salvar','UserController@create')->name('usuario.salvar');
Route::post('/usuario/update/{id}','UserController@save')->name('usuario.atualizar');




Route::get('/autor/listar', 'AutorController@index')->name('autor.listar');
Route::get('/autor/incluir', 'AutorController@new')->name('autor.incluir');
Route::get('/autor/cancelar', 'AutorController@cancel')->name('autor.cancelar');

Route::get('/autor/alterar/{id}','AutorController@update')->name('autor.update');
Route::get('/autor/excluir/{id}','AutorController@delete')->name('autor.delete');
Route::get('/autor/consultar/{id}','AutorController@view')->name('autor.consultar');

Route::post('/autor/salvar','AutorController@create')->name('autor.salvar');
Route::post('/autor/update/{id}','AutorController@save')->name('autor.atualizar');
Route::post('/autor/excluir/{id}','AutorController@excluir')->name('autor.excluir');


Route::get('/editora/listar', 'EditoraController@index')->name('editora.listar');
Route::get('/editora/incluir', 'EditoraController@new')->name('editora.incluir');
Route::get('/editora/cancelar', 'EditoraController@cancel')->name('editora.cancelar');

Route::get('/editor/alterar/{id}','EditoraController@update')->name('editora.update');
Route::get('/editora/excluir/{id}','EditoraController@delete')->name('editora.delete');
Route::get('/editora/consultar/{id}','EditoraController@view')->name('editora.consultar');

Route::post('/editora/salvar','EditoraController@create')->name('editora.salvar');
Route::post('/editora/update/{id}','EditoraController@save')->name('editora.atualizar');
Route::post('/editora/excluir/{id}','EditoraController@excluir')->name('editora.excluir');


Route::get('/livro/listar', 'LivroController@index')->name('livro.listar');
Route::get('/livro/incluir', 'LivroController@new')->name('livro.incluir');
Route::get('/livro/cancelar', 'LivroController@cancel')->name('livro.cancelar');

Route::get('/livro/alterar/{id}','LivroController@update')->name('livro.update');
Route::get('/livro/excluir/{id}','LivroController@delete')->name('livro.delete');
Route::get('/livro/consultar/{id}','LivroController@view')->name('livro.consultar');

Route::post('/livro/salvar','LivroController@create')->name('livro.salvar');
Route::post('/livro/update/{id}','LivroController@save')->name('livro.atualizar');
Route::post('/livro/excluir/{id}','LivroController@excluir')->name('livro.excluir');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
