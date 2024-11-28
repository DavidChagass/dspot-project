<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\FuncionarioControlller;
use App\Http\Controllers\GerenteController;
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

// Rota inicial que exibe a view 'welcome'
Route::view('/', 'welcome')->name('welcome');

// Carrega as rotas de autenticação definidas no arquivo 'auth.php'
require __DIR__ . '/auth.php';

// Rota para login unificado
Route::get('/login', Login::class)->name('login');

// Rotas de funcionalidade para o funcionário, protegidas pelo middleware 'auth:funcionario'
Route::middleware(['auth:funcionario'])->group(function () {
    // Rota de logout do funcionário
    Route::get('/funcionario/logout', function () {
        Auth::guard('funcionario')->logout(); // Faz logout do funcionário
        return redirect()->route('login'); // Redireciona para a página de login
    })->name('logout.funcionario');
});

// Dashboard do funcionário
Route::get('/funcionario/dashboard', Dashboard::class)->name('funcionario-dashboard');

// Rotas de funcionalidade para o gerente, protegidas pelo middleware 'auth:gerente'
Route::middleware(['auth:gerente'])->group(function () {
    // Rota de logout do gerente
    Route::get('/gerente/logout', function () {
        Auth::guard('gerente')->logout(); // Faz logout do gerente
        return redirect()->route('login'); // Redireciona para a página de login
    })->name('logout.gerente');
});

// Dashboard do gerente
Route::get('/gerente/dashboard', Dashboard::class)->name('gerente-dashboard');

// Rotas para a empresa, protegidas pelo middleware 'guest:empresa' para usuários não autenticados
Route::middleware(['guest:empresa'])->group(function () {
    // Rota de registro para a empresa
    Route::get('/empresa/register', EmpresaRegister::class)->name('empresa.register');
});

// Rotas de funcionalidade para a empresa, protegidas pelo middleware 'auth:empresa'
Route::middleware(['auth:empresa'])->group(function () {
    // Rota de logout da empresa
    Route::get('/empresa/logout', function () {
        Auth::guard('empresa')->logout(); // Faz logout da empresa
        return redirect()->route('login'); // Redireciona para a página de login
    })->name('logout.empresa');
});

// Dashboard da empresa
Route::get('/empresa/dashboard', Dashboard::class)->name('empresa-dashboard');

// Rotas de registro de novo gerente e funcionário
Route::get('/gerente/register', GerenteRegister::class)->name('gerente-register'); // Registro de gerente
Route::get('/funcionario/register', FuncionarioRegister::class)->name('funcionario-register'); // Registro de funcionário

// Rotas de produto para o gerente
Route::get('/gerente/produtos/create', [GerenteController::class, 'create'])->name('gerente.produtos.create'); // Rota para criar produto
Route::post('/gerente/produtos', [GerenteController::class, 'store'])->name('gerente.produtos.store'); // Rota para armazenar novo produto
Route::get('/gerente/produtos/{id}', [GerenteController::class, 'show'])->name('gerente.produtos.show'); // Exibe detalhes do produto
Route::get('/gerente/produtos/edit/{id}', [GerenteController::class, 'edit'])->name('gerente.produtos.edit'); // Edita um produto
Route::put('/gerente/produtos/{id}', [GerenteController::class, 'update'])->name('gerente.produtos.update'); // Atualiza as informações do produto
Route::delete('/gerente/produtos/{id}', [GerenteController::class, 'destroy'])->name('gerente.produtos.destroy'); // Exclui um produto

// Rotas de produto para o funcionário
Route::get('/funcionario/produtos/{id}', [FuncionarioControlller::class, 'show'])->name('funcionario.produtos.show'); // Exibe detalhes do produto
Route::get('/funcionario/produtos/edit/{id}', [FuncionarioControlller::class, 'edit'])->name('funcionario.produtos.edit'); // Edita a quantidade de produto
Route::put('/funcionario/produtos/{id}', [FuncionarioControlller::class, 'update'])->name('funcionario.produtos.update'); // Atualiza produto

// Rotas de estoque para a empresa
Route::get('/empresa/estoque/create', [EmpresaController::class, 'create'])->name('empresa.estoque.create'); // Criação de estoque
Route::post('/empresa/estoque', [EmpresaController::class, 'store'])->name('empresa.estoque.store'); // Armazena estoque
Route::get('/empresa/estoque/{id}', [EmpresaController::class, 'show'])->name('empresa.estoque.show'); // Exibe detalhes do estoque
Route::get('/empresa/estoque/edit/{id}', [EmpresaController::class, 'edit'])->name('empresa.estoque.edit'); // Edita estoque
Route::put('/empresa/estoque/{id}', [EmpresaController::class, 'update'])->name('empresa.estoque.update'); // Atualiza estoque
Route::delete('/empresa/estoque/{id}', [EmpresaController::class, 'destroy'])->name('empresa.estoque.destroy'); // Exclui estoque

// Rotas de produto para a empresa
Route::get('/empresa/produtos/create', [EmpresaController::class, 'createproduto'])->name('empresa.produtos.create'); // Criação de produto
Route::post('/empresa/produtos', [EmpresaController::class, 'storeproduto'])->name('empresa.produtos.store'); // Armazena produto
Route::get('/empresa/produtos/{id}', [EmpresaController::class, 'showproduto'])->name('empresa.produtos.show'); // Exibe detalhes do produto
Route::get('/empresa/produtos/edit/{id}', [EmpresaController::class, 'editproduto'])->name('empresa.produtos.edit'); // Edita produto
Route::put('/empresa/produtos/{id}', [EmpresaController::class, 'updateproduto'])->name('empresa.produtos.update'); // Atualiza produto
Route::delete('/empresa/produtos/{id}', [EmpresaController::class, 'destroyproduto'])->name('empresa.produtos.destroy'); // Exclui produto
