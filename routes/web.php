<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

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

Route::get('/', [UsuarioController::class, 'logar'])
    ->name('logar');

Route::get('/cadastra', [UsuarioController::class, 'cadastra'])
    ->name('cadastra');


Route::get('/inicio', [UsuarioController::class, 'index'])
    ->name('inicio');

Route::post('/cadastra/usuario', [UsuarioController::class, 'store'])
    ->name('store.user')->middleware(CheckEdit::class);

Route::post('/logando', [UsuarioController::class, 'loginuser'])
    ->name('login.user');

Route::match(['get', 'post'], '/logout', [UsuarioController::class, 'logout'])
    ->name("sair");


Route::get('/controle/acesso', [UsuarioController::class, 'acesso'])
    ->name('acesso');

Route::post('/excluir/confirmar', [UsuarioController::class, 'confirmDelete'])
    ->name('confirma.delete')->middleware(CheckEdit::class);


Route::match(['get', 'post'], '/acesso/usuario/{id?}/deletar', [UsuarioController::class, 'destroy'])
    ->name('destroy')->middleware(CheckEdit::class);

Route::match(['get', 'post'], "/acesso/{id?}/editar", [UsuarioController::class, 'edit'])
    ->name('edit')->middleware(CheckEdit::class);


Route::post('/acesso/usuario/editado', [UsuarioController::class, 'update'])
    ->name('update')->middleware(CheckEdit::class);


Route::match(['get', 'post'], '/acesso/usuario/{id?}/deletar', [UsuarioController::class, 'destroy'])
    ->name('destroy')->middleware(CheckEdit::class);

//ajax

Route::post("/kimberly/sentax", [UsuarioController::class, 'getkimberly'])
    ->name('kimberly.sentax')->middleware('auth');

Route::post("/quimicos/sentax", [UsuarioController::class, 'getquimicos'])
    ->name('quimicos.sentax')->middleware('auth');

Route::post("/rubbermaid/sentax", [UsuarioController::class, 'getrubbermaid'])
    ->name("rubbermaid.sentax")->middleware('auth');

Route::post("/outros/sentax", [UsuarioController::class, 'getoutros'])
    ->name('outros.sentax')->middleware('auth');
    
Route::post("/estoque/sentax", [UsuarioController::class, 'getestoque'])
    ->name('estoque.sentax')->middleware('auth');