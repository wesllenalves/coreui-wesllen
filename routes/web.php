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

Auth::routes();
/* CoreUI templates */

Route::middleware('auth')->group(function() {
	Route::view('/', 'dashboard');
	//Route::view('/', 'panel.blank');
	// Section CoreUI elements
	Route::view('dashboard','dashboard');
	/* --Clientes-- */
	Route::get('/sample/cliente', 'ControllerCliente@index');
	Route::get('/sample/cliente/visualizar/{id}', 'ControllerCliente@cliente');
	Route::get('/sample/cliente/clienteEditar/{id}', 'ControllerCliente@clienteEditar');
	Route::post('/sample/cliente/editar/{id}', 'ControllerCliente@editar');
	Route::get('/sample/cliente/adicionar', 'ControllerCliente@adicionar');
	Route::post('/sample/cliente/adicionarCliente', 'ControllerCliente@adicionarCliente');
	Route::get('/sample/cliente/deletar/{id}', 'ControllerCliente@deletar');
	/* --Produtos-- */
	Route::get('/sample/produto', 'ControllerProduto@index');
	Route::get('/sample/produto/adicionar', 'ControllerProduto@adicionar');
	Route::post('/sample/produto/adicionarProduto', 'ControllerProduto@adicionarProduto');
	Route::get('/sample/produto/produtoEditar/{idProduto}', 'ControllerProduto@produtoEditar');
	Route::get('/sample/produto/visualizar/{idProduto}', 'ControllerProduto@produto');
	Route::post('/sample/produto/editar/{idProduto}', 'ControllerProduto@editar');
	Route::get('/sample/produto/deletar/{idProduto}', 'ControllerProduto@deletar');

	Route::view('/sample/dashboard','samples.dashboard');
	Route::view('/sample/buttons','samples.buttons');
	Route::view('/sample/social','samples.social');
	Route::view('/sample/cards','samples.cards');
	Route::view('/sample/forms','samples.forms');
	Route::view('/sample/modals','samples.modals');
	Route::view('/sample/switches','samples.switches');
	Route::view('/sample/tables','samples.tables');
	Route::view('/sample/tabs','samples.tabs');
	Route::view('/sample/icons-font-awesome', 'samples.font-awesome-icons');
	Route::view('/sample/icons-simple-line', 'samples.simple-line-icons');
	Route::view('/sample/widgets','samples.widgets');
	Route::view('/sample/charts','samples.charts');
});
// Section Pages
Route::view('/sample/error404','errors.404')->name('error404');
Route::view('/sample/error500','errors.500')->name('error500');
// Cadastro 
