<?php

namespace App\Http\Controllers;

use App\Events\ProductCreated;
use App\Events\ProductDeleted;
use App\Events\ProductUpdated;
use App\Http\Controllers\Controller;
use App\Models\empresas;
use App\Models\User;
use App\Models\estoque;
use App\Models\gerentes;
use App\Models\produtos;
use Exception;
use Illuminate\Http\Request;

class GerenteController extends Controller
{
    // Variável para armazenar o estoque_id
    public $estoque_id;

    // Método para exibir o formulário de criação de um novo produto
    public function create()
    {
        // Obtém o usuário autenticado
        $user = auth()->guard()->user();
        // Obtém a empresa associada ao usuário
        $empresa = $user->empresa_id;
        // Obtém os estoques associados à empresa
        $estoques = estoque::where('empresa_id', $empresa)->get();

        // Exibe o formulário de criação de produto com os estoques disponíveis
        return view('livewire.pages.gerentes.gerente-produto-create', compact('estoques'));
    }

    // Método para armazenar um novo produto no banco de dados
    public function store(Request $request)
    {
        // Obtém o usuário autenticado
        $user = auth()->guard()->user();
        // Obtém a empresa associada ao usuário
        $empresa = $user->empresa_id;
        // Obtém o primeiro estoque da empresa
        $estoque = estoque::where('empresa_id', $empresa)->first();
        $estoque_id = $estoque->id;

        // Validação dos dados recebidos no formulário
        $request->validate([
            'produto' => 'required',
            'detalhes' => 'required',
            'perecivel' => 'required',
            'quantidadeAtual' => 'required|numeric|lte:quantidadeTotal',
            'quantidadeTotal' => 'required|numeric',
            'precoCompra' => 'required|numeric',
            'precoVenda' => 'required|numeric',
            'dataValidade' => '',
            'fornecedor' => 'required',
            'estoque_id' => 'required',
        ]);

        // Criação do novo produto
        $produto = new produtos();
        $produto->produto = $request->input('produto');
        $produto->detalhes = $request->input('detalhes');
        $produto->perecivel = $request->input('perecivel');
        $produto->quantidadeAtual = $request->input('quantidadeAtual');
        $produto->quantidadeTotal = $request->input('quantidadeTotal');
        $produto->precoCompra = $request->input('precoCompra');
        $produto->precoVenda = $request->input('precoVenda');
        $produto->dataValidade = $request->input('dataValidade');
        $produto->fornecedor = $request->input('fornecedor');
        $produto->estoque_id = $request->input('estoque_id'); // Atribui o ID do estoque
        $produto->save();

        //chama o evento para registrar a criação de um novo produto
        event(new ProductCreated($produto, auth()->guard()->user()));
        // Exibe uma mensagem de sucesso e redireciona para o dashboard do gerente
        session()->flash('message', 'Produto inserido com sucesso!');
        return redirect()->route('gerente-dashboard');
    }

    // Método para exibir os detalhes de um produto específico
    public function show($id)
    {
        // Busca o produto pelo ID
        $produto = produtos::find($id);

        // Verifica se o produto não foi encontrado e redireciona com uma mensagem de erro
        if (!$produto) {
            return redirect()->route('gerente-dashboard')
                ->with('error', 'Produto não encontrado.');
        }

        // Exibe os detalhes do produto
        return view('livewire.pages.gerentes.gerente-detalhes-produto', compact('produto'));
    }

    // Método para exibir o formulário de edição de um produto
    public function edit($id)
    {
        // Busca o produto pelo ID
        $produto = produtos::find($id);
        // Exibe o formulário de edição com os dados do produto
        return view('livewire.pages.gerentes.gerente-produto-edit', compact('produto'));
    }

    // Método para atualizar os dados de um produto
    public function update(Request $request, $id)
    {
        // Busca o produto pelo ID
        $produtos = produtos::find($id);
        // Valida os dados recebidos no formulário, garantindo que a quantidade atual não ultrapasse a total
        $original = $produtos->getOriginal();
        $descricao = [];

        $request->validate([
            'quantidadeAtual' => 'required|numeric|lte:quantidadeTotal',  // Validação de quantidade
        ]);
        // Atualiza os dados do produto com as informações do formulário
        $produtos->update($request->all());

        //registra a alteração e envia o evento para a tabela de auditoria
        foreach ($produtos->getAttributes() as $atributo => $valor) {
            if ($original[$atributo] != $valor && $atributo != 'updated_at') {
                $descricao[] = $atributo . ' alterado de ' . $original[$atributo] . ' para ' . $valor;
            }
        }
        event(new ProductUpdated($produtos, auth()->guard()->user(), implode(', ', $descricao), $produtos->produto));

        // Redireciona para o dashboard do gerente
        return redirect()->route('gerente-dashboard');
    }

    // Método para deletar um produto
    public function destroy($id)
    {
        // Busca o produto pelo ID
        $produtos = produtos::find($id);
        // Deleta o produto
        $produtos->delete();

        event(new ProductDeleted($produtos, auth()->guard()->user()));

        // Redireciona para o dashboard do gerente
        return redirect()->route('gerente-dashboard');
    }

    //rotas para funcionario
    public function showFuncionario()
    {
        // Obtém o usuário autenticado
        $user = auth()->guard()->user();
        // Obtém a empresa associada ao usuário
        $empresa_id = $user->empresa_id;
    
        // Busca o funcionário associado ao ID da empresa
        $funcionario = User::where('empresa_id', $empresa_id)->first();
    
        // Retorna a view com os dados do funcionário
        return view('livewire.pages.gerentes.gerente-funcionario-show', compact('funcionario'));
    }

    // concertar dps
    public function destroyfuncionario()
    {
        // Obtém o usuário autenticado
        $user = auth()->guard()->user();
        // Obtém a empresa associada ao usuário
        $empresa_id = $user->empresa_id;

        $funcionario = User::where('empresa_id', $empresa_id)->first();
        //dd($gerente);
        $funcionario->delete();

        return redirect()->route('empresa-dashboard');
    }
    
    
}
