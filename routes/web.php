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


Route::view('/', 'welcome')->name('welcome');

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
//rota para mostrar a dashboard da empresa

Route::get('/empresa/dashboard', Dashboard::class)->name('empresa-dashboard');


//rota de registro de um novo gerente
Route::get('/gerente/register', GerenteRegister::class)->name('gerente-register');
//rota de registro de um novo funcionário
Route::get('/funcionario/register', FuncionarioRegister::class)->name('funcionario-register');



//rotas de produto para o gerente
//rota de redirecionamento para a criação de um novo produto
Route::get('/gerente/produtos/create', [GerenteController::class, 'create'])->name('gerente.produtos.create');
//rota para criar um novo produto
Route::post('/gerente/produtos', [GerenteController::class, 'store'])->name('gerente.produtos.store');
//rota para mostrar os detalhes de um produto
Route::get('/gerente/produtos/{id}', [GerenteController::class, 'show'])->name('gerente.produtos.show');
//rota de redirecionamento para editar as informações de um produto
Route::get('/gerente/produtos/edit/{id}', [GerenteController::class, 'edit'])->name('gerente.produtos.edit');
//rota para a alteração de um produto
Route::put('/gerente/produtos/{id}', [GerenteController::class, 'update'])->name('gerente.produtos.update');
//rota para a exclusão de um produto
Route::delete('/gerente/produtos/{id}', [GerenteController::class, 'destroy'])->name('gerente.produtos.destroy');


//rotas de produto para funcionario
//rota para mostrar os detalhes de um produto
Route::get('/funcionario/produtos/{id}', [FuncionarioControlller::class, 'show'])->name('funcionario.produtos.show');
//rota para redirecionamento para editar a quantidade de um produto
Route::get('/funcionario/produtos/edit/{id}', [FuncionarioControlller::class, 'edit'])->name('funcionario.produtos.edit');
//rota para a alteração de um produto
Route::put('/funcionario/produtos/{id}', [FuncionarioControlller::class, 'update'])->name('funcionario.produtos.update');


//rotas de estoque para empresa
//rota de redirecionamento para a criação de um novo estoque
Route::get('/empresa/estoque/create', [EmpresaController::class, 'create'])->name('empresa.estoque.create');
//rota para criar um novo estoque
Route::post('/empresa/estoque', [EmpresaController::class, 'store'])->name('empresa.estoque.store');
//rota para mostrar os detalhes de um estoque
Route::get('/empresa/estoque/{id}', [EmpresaController::class, 'show'])->name('empresa.estoque.show');
//rota para redirecionamento para editar as informações de um estoque
Route::get('/empresa/estoque/edit/{id}', [EmpresaController::class, 'edit'])->name('empresa.estoque.edit');
//rota para a alteração de um estoque
Route::put('/empresa/estoque/{id}', [EmpresaController::class, 'update'])->name('empresa.estoque.update');
//rota para a exclusão de um estoque
Route::delete('/empresa/estoque/{id}', [EmpresaController::class, 'destroy'])->name('empresa.estoque.destroy');




//rotas de produto para empresa
//rota de redirecionamento para a criação de um novo produto
Route::get('/empresa/produtos/create', [EmpresaController::class, 'createproduto'])->name('empresa.produtos.create');
//rota para criar um novo produto
Route::post('/empresa/produtos', [EmpresaController::class, 'storeproduto'])->name('empresa.produtos.store');
//rota para mostrar os detalhes de um produto
Route::get('/empresa/produtos/{id}', [EmpresaController::class, 'showproduto'])->name('empresa.produtos.show');
//rota para redirecionamento para editar as informações de um produto
Route::get('/empresa/produtos/edit/{id}', [EmpresaController::class, 'editproduto'])->name('empresa.produtos.edit');
//rota para a alteração de um produto
Route::put('/empresa/produtos/{id}', [EmpresaController::class, 'updateproduto'])->name('empresa.produtos.update');
//rota para a exclusão de um produto
Route::delete('/empresa/produtos/{id}', [EmpresaController::class, 'destroyproduto'])->name('empresa.produtos.destroy');
