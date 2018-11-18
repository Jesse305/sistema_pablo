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

Route::get('/', function () {
    return view('welcome');
})->name('inicio');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function(){
  Route::get('/home', function(){
    return view('app/home');
  })->name('home');

  Route::get('/cadastro/{user}', 'UserController@cadastro')->name('cadastro');
  Route::post('/alterar/meu_cadastro/{user}', 'UserController@alterar_cadastro')->name('alterar_cadastro');
  Route::post('/alterar/minha_senha/{user}', 'UserController@alterar_senha')->name('alterar_senha');

  Route::get('/imc', 'ImcController@imc')->name('imc');

  Route::get('/acompanhamento', 'AlimentoController@acompanhamento')->name('acompanhamento');
  Route::post('/acompanhamento/alimento/create_or_update', 'AlimentoController@createOrUpdate')->name('alimento.create_or_update');
  Route::get('/acompanhamento/alimento/remove/{id}', 'AlimentoController@remove')->name('alimento.remove');
});
