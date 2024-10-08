<?php

use App\Livewire\EmpresaDashboard;
use App\Livewire\FuncionarioDashboard;
use App\Livewire\GerenteDashboard;
use App\Livewire\Pages\Auth\EmpresaLogin;
use App\Livewire\Pages\Auth\EmpresaRegister;
use App\Livewire\Pages\Auth\GerenteLogin;
use App\Livewire\Pages\Auth\GerenteRegister;
use App\Livewire\Pages\Auth\FuncionarioLogin;
use App\Livewire\Pages\Auth\FuncionarioRegister;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\GerenteController;


Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';



// rotas de funcionario
Route::get('/funcionario/login', FuncionarioLogin::class)->name('login.funcionario')->middleware('guest:funcionario');

Route::middleware(['auth:funcionario'])->group(function () {
    Route::get('/funcionario/dashboard', FuncionarioDashboard::class)->name('funcionario-dashboard');

});

Route::get('/funcionario/logout', function () {
    Auth::guard('funcionario')->logout();
    return redirect()->route('login.funcionario');
})->name('logout.funcionario');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/funcionario/login', FuncionarioLogin::class)->name('login.funcionario');
    Route::get('/funcionario/register', FuncionarioRegister::class)->name('funcionario.register');
});






// rotas de gerente
Route::get('/gerente/login', GerenteLogin::class)->name('login.gerente')->middleware('guest:gerente');


Route::middleware(['auth:gerente'])->group(function () {
    Route::get('/gerente/dashboard', GerenteDashboard::class)->name('gerente-dashboard');
});

Route::get('/gerente/logout', function () {
    Auth::guard('gerente')->logout();
    return redirect()->route('login.gerente');
})->name('logout.gerente');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/gerente/login', GerenteLogin::class)->name('login.gerente');
    Route::get('/gerente/register', GerenteRegister::class)->name('gerente.register');
});

// rotas de estoque do gerente
Route::GET('/gerente/inserir-estoque', [GerenteController::class, 'inserirEstoque'])->name('gerente.inserir-estoque');






// rotas de empresa
Route::get('/empresa/login', EmpresaLogin::class)->name('login.empresa')->middleware('guest:empresa');


Route::middleware(['auth:empresa'])->group(function () {
    Route::get('/empresa/dashboard', EmpresaDashboard::class)->name('empresa-dashboard');
});

route::get('/empresa/logout', function () {
    Auth::guard('empresa')->logout();
    return redirect()->route('login.empresa');
})->name('logout.empresa');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/empresa/login', EmpresaLogin::class)->name('login.empresa');
    Route::get('/empresa/register', EmpresaRegister::class)->name('empresa.register');
});










