<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlphaVantageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GraficController;
use App\Http\Controllers\Auth\CadastroController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Rotas públicas
|--------------------------------------------------------------------------
*/

// Página inicial (welcome / cadastro)
Route::get('/', [CadastroController::class, 'index'])->name('welcome');
Route::post('/cadastro/salvar', [CadastroController::class, 'salvar'])->name('cadastro.salvar');

// Login
Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

/*
|--------------------------------------------------------------------------
| Rotas protegidas (necessitam de autenticação)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Home após login
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Perfil
    Route::get('/perfil', function () {
        return view('perfil');
    })->name('perfil');

    // Carteira
    Route::get('/carteira', function () {
        return view('carteira');
    })->name('carteira');

    // Rotas adicionais
    Route::get('/teste', [AlphaVantageController::class, 'teste'])->name('teste');
    Route::get('/grafico', [GraficController::class, 'show'])->name('grafico');
});
