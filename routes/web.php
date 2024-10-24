<?php


use App\Livewire\EmpresaDashboard;
use App\Livewire\FuncionarioDashboard;
use App\Livewire\GerenteDashboard;
use App\Livewire\Pages\Auth\EmpresaRegister;
use App\Livewire\Pages\Auth\GerenteRegister;
use App\Livewire\Pages\Auth\FuncionarioRegister;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Pages\Auth\Login;


Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';


// Rota para login unificada
Route::get('/login', Login::class)->name('login');

// Rotas para funcionário
Route::middleware(['guest:funcionario'])->group(function () {
    Route::get('/funcionario/register', FuncionarioRegister::class)->name('funcionario.register');
});

Route::middleware(['auth:funcionario'])->group(function () {
    Route::get('/funcionario/dashboard', FuncionarioDashboard::class)->name('funcionario-dashboard');

    Route::get('/funcionario/logout', function () {
        Auth::guard('funcionario')->logout();
        return redirect()->route('login');
    })->name('logout.funcionario');
});

// Rotas para gerente
Route::middleware(['guest:gerente'])->group(function () {
    Route::get('/gerente/register', GerenteRegister::class)->name('gerente.register');
});

Route::middleware(['auth:gerente'])->group(function () {
    Route::get('/gerente/dashboard', GerenteDashboard::class)->name('gerente-dashboard');
    Route::get('/gerente/logout', function () {
        Auth::guard('gerente')->logout();
        return redirect()->route('login');
    })->name('logout.gerente');
});

// Rotas para empresa
Route::middleware(['guest:empresa'])->group(function () {
    Route::get('/empresa/register', EmpresaRegister::class)->name('empresa.register');
});

Route::middleware(['auth:empresa'])->group(function () {
    Route::get('/empresa/dashboard', EmpresaDashboard::class)->name('empresa-dashboard');
    Route::get('/empresa/logout', function () {
        Auth::guard('empresa')->logout();
        return redirect()->route('login');
    })->name('logout.empresa');
});





