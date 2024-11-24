<?php

use App\Http\Controllers\GerenteController;
use App\Http\Controllers\ProdutoController;
use App\Livewire\EmpresaDashboard;
use App\Livewire\FuncionarioDashboard;
use App\Livewire\GerenteDashboard;
use App\Livewire\Pages\Auth\EmpresaRegister;
use App\Livewire\Pages\Auth\GerenteRegister;
use App\Livewire\Pages\Auth\FuncionarioRegister;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Pages\Auth\Login;
use App\Livewire\Dashboard;


Route::view('/', 'welcome')->name('welcome');

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
Route::middleware(['auth:funcionario'])->group(function () {
    Route::get('/funcionario/logout', function () {
        Auth::guard('funcionario')->logout();
        return redirect()->route('login');
    })->name('logout.funcionario');
});
Route::get('/funcionario/dashboard', Dashboard::class)->name('funcionario-dashboard');

// Rotas para gerente
Route::middleware(['auth:gerente'])->group(function () {
    Route::get('/gerente/logout', function () {
        Auth::guard('gerente')->logout();
        return redirect()->route('login');
    })->name('logout.gerente');
});
Route::get('/gerente/dashboard', Dashboard::class)->name('gerente-dashboard');

// Rotas para empresa
Route::middleware(['guest:empresa'])->group(function () {
    Route::get('/empresa/register', EmpresaRegister::class)->name('empresa.register');
});

Route::middleware(['auth:empresa'])->group(function () {
    Route::get('/empresa/logout', function () {
        Auth::guard('empresa')->logout();
        return redirect()->route('login');
    })->name('logout.empresa');
});
Route::get('/empresa/dashboard', Dashboard::class)->name('empresa-dashboard');



Route::get('/gerente/register', GerenteRegister::class)->name('gerente-register');
Route::get('/funcionario/register', FuncionarioRegister::class)->name('funcionario-register');


//rotas de produto para o gerente
Route::get('/produtos/create', [GerenteController::class, 'create'])->name('produtos.create');
Route::post('/produtos', [GerenteController::class, 'store'])->name('produtos.store');
Route::get('produtos/{id}', [GerenteController::class, 'show'])->name('produtos.show');
Route::get('/produtos/edit/{id}', [GerenteController::class, 'edit'])->name('produtos.edit');
Route::put('/produtos/{id}', [GerenteController::class, 'update'])->name('produtos.update');
