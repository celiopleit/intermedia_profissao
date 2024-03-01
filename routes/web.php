<?php

use App\Http\Controllers\FluenciaController;
use App\Http\Controllers\ProfissaoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layout.layout');
});

Route::resource('fluencia', FluenciaController::class);
Route::resource('profissao', ProfissaoController::class);
