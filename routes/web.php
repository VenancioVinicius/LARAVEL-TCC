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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('templates.main')->with('titulo', "");
})->middleware(['auth'])->name('index');

Route::resource('geradorResiduos', 'GeradorResiduoController')->middleware(['auth']);
Route::resource('coletaResiduos', 'ColetaResiduoController')->middleware(['auth']);
Route::resource('catadors', 'CatadorController')->middleware(['auth']);
Route::resource('recebidos', 'RecebidoController')->middleware(['auth']);

require __DIR__.'/auth.php';
