<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlphaVantageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GraficController;
use App\Http\Controllers\Auth\CadastroController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

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

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Form para pedir reset
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

// Enviar link por e-mail
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Form para reset com token
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

// Atualizar a senha
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/tesouro', function () {
    return view('tesouro');
})->name('tesouro');
Route::get('/cdb', function () {
    return view('cdb');
})->name('cdb');
Route::get('/lci_lca', function () {
    return view('lci_lca');
})->name('lci_lca');