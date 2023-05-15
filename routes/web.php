<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Middleware\LogAcessoMiddleware;

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

//Chamando a rota a partir de um controllardor 

#Para nomear rotas usamos o metodo name
#Esse name não serve para navegação web mas sim como um apelido para nossa aplicação.
// Route::middleware(LogAcessoMiddleware::class)->

Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');

// Route::get('/', function () {
//     return 'Hello!';
// });

#Fluxo segue da seguinte maneira: 
#Rota(route), Controlador(controller) e Views

#O route chama a url e posteriormente uma função callback
#Essa função pode ser uma função direta ou uma string chamando um controller e sua função após o '@'
#Esse controller pode retornar uma função direta ou ser renderizado a partir de uma view. 

#rota preparada e configurada para receber um parametro
#quando passado o parametro direto o mesmo se torna obrigatório para rota
#para tornalo opcional basta adicionar uma "?" à frente do mesmo.

#agora quando definido que o campo será opicional devemos passar uma informação default passando ela na "function"
#na frente de sua variável ex. $a = "valor vazio"

#obs. parâmetros opcionais devem ser passado da direita para esquerda (de trás pra frente).
// Route::get(
//     '/contato/{nome?}/{categoria?}/{assunto?}/{mensagem?}', 
//     function(
//         string $nome = 'Nome não informado.', 
//         string $categoria = 'Categoria não informada.', 
//         string $assunto = 'Assunto não informado.', 
//         string $mensagem = 'Mensagem não informada.'
//     ){
//         echo "Olá $nome - $categoria - $assunto - $mensagem";
//     }
// );

#Definindo tipagem para os parâmetros passados para a url atráves de expressões regulares.
// Route::get(
//     '/contato/{nome}/{categoria_id}', 
//     function(
//         string $nome = 'Nome não informado.', 
//         int $categoria_id = 1 # 1 = categoria: Informação
//     ){
//         echo "Olá $nome - $categoria_id";
//     }
// )->where('categoria_id','[0-9]+')->where('nome', '[A-Za-z]+'); #Aqui definimos qual parâmetro terá uma expressão regular e qual será essa expressão.

Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

#Agrupamento de rotas usando um prefix
Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function(){
    Route::get('/clientes', function(){return 'clientes';})->name('app.clientes');
    Route::get('/fornecedores', 'FornecedorController@index')->name('app.fornecedores');
    Route::get('/produtos', function(){return 'produtos';})->name('app.produtos');
});

#Redirecinamento de rotas
#Existem três formas de serem feitas
#No callback (function), por metodo do laravel (redirect) ou pelo seu controllador
// Route::get('/rota1', function(){
//     echo "rota 1";
// })->name('site.rota1');

#redirecionamento pela função de callback:
// Route::get('/rota2', function(){
//     return redirect()->route('site.rota1'); #Utilizamos o name da rota
// })->name('site.rota2');

#redirect recebe dois parâmetros sendo eles
#o primeiro a rota de origem e o segundo a rota de destino:
// Route::redirect('/rota2', '/rota1');

#Criando uma rota de fallback
Route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para ir para à página inicial!';
});

#Encaminhando parâmetros da rota para o controlador
Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');