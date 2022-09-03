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

Route::get('/', 'PrincipalController@principal')->name('site.index')->middleware('log.acesso');
Route::get('/sobre', 'SobreController@sobre')->name('site.sobre');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');

Route::get('/login', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

//app
Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function () {

    Route::get('/clientes', function () {
        return view('clientes');
    })
        ->name('app.clientes');


    Route::get('/fornecedores','FornecedorController@index')
        ->name('app.fornecedores');

    Route::get('/produtos', function () {
        return view('produtos');
    })
        ->name('app.produtos');
});



Route::fallback(function () {
    return view('404');
});


