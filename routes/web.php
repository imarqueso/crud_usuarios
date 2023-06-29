<?php

use App\Http\Controllers\CadastroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;


Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('cadastro.index');
    });

    // USUÁRIOS
    Route::get('/usuarios', [UsuariosController::class, 'view'])->name('usuariosView');
    Route::post('/usuarios/{id}/excluir', [UsuariosController::class, 'excluir'])->name('excluirUsuario');
});

// LOGIN USUÁRIO
Route::get('/entrar', [LoginController::class, 'loginView'])->name('loginView');
Route::post('/entrar', [LoginController::class, 'login'])->name('login');
Route::get('/sair', [LoginController::class, 'logout'])->name('logout');

// CADASTRO DE USUÁRIOS
Route::get('/cadastrar', [CadastroController::class, 'view'])->name('cadastrar');
Route::post('/cadastrar', [CadastroController::class, 'cadastrar'])->name('cadastrarUsuario');
