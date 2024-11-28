<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Definindo rotas para usuários não autenticados (guest)
Route::middleware('guest')->group(function () {
    // Rota para a página de registro de usuário
    Volt::route('register', 'pages.auth.register')
        ->name('register'); // Nomeia a rota como 'register'

    // Rota para a página de login de funcionário
    Volt::route('funcionario-login', 'pages.auth.funcionario-login')
        ->name('funcionario-login'); // Nomeia a rota como 'funcionario-login'

    // Rota para a página de solicitação de recuperação de senha
    Volt::route('forgot-password', 'pages.auth.forgot-password')
        ->name('password.request'); // Nomeia a rota como 'password.request'

    // Rota para a página de reset de senha com token
    Volt::route('reset-password/{token}', 'pages.auth.reset-password')
        ->name('password.reset'); // Nomeia a rota como 'password.reset'
});

// Definindo rotas para usuários autenticados
Route::middleware('auth')->group(function () {
    // Rota para a página de verificação de e-mail
    Volt::route('verify-email', 'pages.auth.verify-email')
        ->name('verification.notice'); // Nomeia a rota como 'verification.notice'

    // Rota para o link de verificação de e-mail
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1']) // Middleware para garantir que o link é assinado e limitar as requisições
        ->name('verification.verify'); // Nomeia a rota como 'verification.verify'

    // Rota para a página de confirmação de senha antes de ações sensíveis
    Volt::route('confirm-password', 'pages.auth.confirm-password')
        ->name('password.confirm'); // Nomeia a rota como 'password.confirm'
});

// Rota comentada que parece ser para login de funcionário
/*
Route::middleware(['auth:funcionario'])->group(function () {
    // Rota para login de funcionário
    Route::get('/funcionario/login', FuncionarioLogin::class)->name('login.funcionario');
});
 */
