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

Route::get('/', [UsuarioController::class, 'index'])
    ->name('inicio');

Route::get('/cadastra', [UsuarioController::class, 'cadastra'])
    ->name('cadastra');


Route::get('/logar', [UsuarioController::class, 'logar'])
    ->name('logar');

Route::post('/cadastra/usuario', [UsuarioController::class, 'store'])
    ->name('store.user');
