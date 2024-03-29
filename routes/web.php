<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Log_Acesso_Middleware;

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

/*Route::get('/', function () {
    return 'Ola seja bem vindo';
});*/

Route::get('/','PrincipalController@principal')->name('site.index'); // na versão 8 ('/',[App/Http/Controllers/PrincipalController::class,'prinipal'])    

Route::get('/contato','ContatoController@contato')->name('site.contato');
Route::post('/contato','ContatoController@salvar')->name('site.contato');

Route::get('/sobre-nos','SobreNosController@sobreNos')->name('site.sobrenos');

Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');


Route::middleware('autenticacao') 
->prefix('/app')->group(function(){
    Route::get('/home','HomeController@index')->name('app.home');
    Route::get('/sair','LoginController@sair')->name('app.sair');
    Route::get('/cliente','ClienteController@index')->name('app.cliente');

    Route::get('/fornecedor','FornecedorController@index')->name('app.fornecedor');
    Route::post('/fornecedor/listar','FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar','FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar','FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar','FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}','FornecedorController@editar')->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}','FornecedorController@excluir')->name('app.fornecedor.excluir');


    //produtos
    Route::resource('produto', 'ProdutoController');

        //produto detalhe
        Route::resource('produto-detalhe', 'ProdutoDetalheController');

});

Route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'.route('site.index').'" >Clique aqui </a>para ir para a página inicial';
});


