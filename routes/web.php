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


/* CoreUI templates */
Route::get('/login', 'UserController@login');
Route::get('/', 'ControllerHome@home');
Route::get('/home', 'ControllerHome@home');
Route::post('/orcamento', 'ControllerHome@orcamento');


Auth::routes();
Route::middleware('auth')->group(function() {
	//Route::view('/', 'dashboard');
	Route::view('/painel', 'panel.blank');

	// Dashboard
	Route::get('dashboard','ControllerDashboard@dashboard');	
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
	/*Relatorio*/
	Route::get('/sample/relatorio', 'ControllerFinanceiro@index');
	Route::post('/sample/relatorio/adicionarDespesa', 'ControllerFinanceiro@adicionarDespesa');
	Route::post('/sample/relatorio/adicionarReceita', 'ControllerFinanceiro@adicionarReceita');
	Route::post('/sample/relatorio/editar', 'ControllerFinanceiro@editar');
	Route::get('/sample/relatorio/deletar/{id}', 'ControllerFinanceiro@deletar');
	/*Vendas*/
	Route::get('/sample/vendas', 'ControllerVendas@index');
	Route::get('/sample/vendas/visualizar/{idVenda}', 'ControllerVendas@editarIndex');
	Route::post('/sample/vendas/editar/{idVenda}', 'ControllerVendas@editar');
	Route::get('/sample/vendas/deletar/{idVenda}', 'ControllerVendas@deletar');
	/*Orcamento*/
	Route::get('/sample/orcamento', 'ControllerOrcamento@index');
	Route::get('/sample/orcamento/visualizar/{id}', 'ControllerOrcamento@visualizar');
	Route::get('/sample/orcamento/editar/{id}', 'ControllerOrcamento@editar');
	Route::post('/sample/orcamento/OrcamentoEditar/{id}', 'ControllerOrcamento@editarSalvar');
	Route::post('/sample/orcamento/OrcamentoEditar/deletarProduto/{id}', 'ControllerOrcamento@deletarProduto');
	Route::post('/sample/orcamento/OrcamentoEditar/qtd/editar/{id}', 'ControllerOrcamento@QtdProduto');
	Route::get('/sample/orcamento/deletar/{id}', 'ControllerOrcamento@deletar');
	/*filtro de pesquisa */
	Route::any('/sample/filtro/financeiro', 'ControllerFiltroPesquisa@pesquisarFinanceiro');
	Route::any('/sample/filtro/venda', 'ControllerFiltroPesquisa@pesquisarVendas');
	
	/*Relatorio PDF */
	Route::any('/sample/filtro/relatorio', 'ControllerRelatorio@relatorioPDF');
	/*Configurações */
	Route::get('/sample/usuarios', 'ControllerConfiguracoes@usuarios');
	Route::get('/sample/img/principal', 'ControllerConfiguracoes@imgPrincipal');
	Route::post('/sample/img/upload', 'ControllerConfiguracoes@upload');
	Route::post('/sample/img/editar/{id}', 'ControllerConfiguracoes@imgEditar');
	Route::get('/sample/img/editar/{id}', 'ControllerConfiguracoes@imgDeletar');



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
