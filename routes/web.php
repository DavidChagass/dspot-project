<?php

use App\Livewire\FuncionarioDashboard;
use App\Livewire\FuncionarioLogin;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::get('/funcionario/login', FuncionarioLogin::class)->name('login.funcionario')->middleware('guest:funcionario');
Route::middleware('guest:funcionario')->group(function () {
    Route::get('/funcionario/login', FuncionarioLogin::class)->name('login.funcionario');
});
