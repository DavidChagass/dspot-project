<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\produtos;
use Illuminate\Http\Request;

class FuncionarioControlller extends Controller
{
    // Método para exibir os detalhes de um produto
    public function show($id)
    {
        // Busca o produto pelo ID
        $produto = produtos::find($id);
        // Exibe a página de detalhes do produto
        return view('livewire.pages.funcionarios.funcionario-detalhes-produto', compact('produto'));
    }

    // Método para exibir a página de edição de um produto
    public function edit($id)
    {
        // Busca o produto pelo ID
        $produto = produtos::find($id);
        // Exibe a página de edição do produto
        return view('livewire.pages.funcionarios.funcionario-produto-edit', compact('produto'));
    }

    // Método para atualizar os dados de um produto
    public function update(Request $request, $id)
    {
        // Busca o produto pelo ID
        $produtos = produtos::find($id);
        // Valida os dados enviados, garantindo que a quantidade atual seja menor ou igual à quantidade total
        $request->validate([
            'quantidadeAtual' => 'required|numeric|lte:quantidadeTotal',  // Validação para garantir que a quantidade atual não ultrapasse a total
        ]);
        // Atualiza os dados do produto com as informações do formulário
        $produtos->update($request->all());
        // Redireciona para o dashboard do funcionário
        return redirect()->route('funcionario-dashboard');
    }
}
