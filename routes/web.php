<?php

use App\Livewire\FuncionarioDashboard;
use App\Livewire\Pages\Auth\FuncionarioLogin;
use App\Livewire\Pages\Auth\FuncionarioRegister;
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

Route::middleware(['auth:funcionario'])->group(function () {
    Route::get('/funcionario/dashboard', FuncionarioDashboard::class)->name('funcionario-dashboard');
    
});

//EVITAR MEXER NAS ROTAS, SERIO NÃO MEXER NELAS
Route::get('/funcionario/logout', function () {
    Auth::guard('funcionario')->logout();
    return redirect()->route('login.funcionario');
})->name('logout.funcionario');

//EVITAR MEXER NAS ROTAS, SERIO NÃO MEXER NELAS
Route::group(['middleware' => 'guest'], function () {
    Route::get('/funcionario/login', FuncionarioLogin::class)->name('login.funcionario');
    Route::get('/funcionario/register', FuncionarioRegister::class)->name('funcionario.register');
});
