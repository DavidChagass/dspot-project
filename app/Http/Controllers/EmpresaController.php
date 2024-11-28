<?php

namespace App\Http\Controllers;

use App\Events\ProductCreated;
use App\Events\ProductDeleted;
use App\Events\ProductUpdated;
use App\Http\Controllers\Controller;
use App\Models\empresas;
use App\Models\estoque;
use App\Models\produtos;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    // Atributo para armazenar o ID do estoque
    public $estoque_id;

    // Método para exibir a página de criação de produto
    public function createproduto()
    {
        // Recupera o ID da empresa associada ao usuário autenticado
        $empresa_id = empresas::where('user_id', auth()->guard()->user()->id)->first()->id;

        // Se o usuário não possui uma empresa, redireciona para o dashboard da empresa
        if (!$empresa_id) {
            return redirect()->route('empresa-dashboard');
        } else {
            // Se a empresa existir, busca os estoques relacionados a ela
            $estoques = estoque::where('empresa_id', $empresa_id)->get();
            // Exibe a view para criar um novo produto, passando os estoques encontrados
            return view('livewire.pages.empresas.empresa-produto-create', compact('estoques'));
        }
    }

    // Método para armazenar os dados de um novo produto
    public function storeproduto(Request $request)
    {
        // Recupera o ID da empresa associada ao usuário autenticado
        $empresa_id = empresas::where('user_id', auth()->guard()->user()->id)->first()->id;
        // Se o usuário não possui uma empresa, redireciona para a página de login
        if (!$empresa_id) {
            return redirect()->route('login');
        } else {
            // Valida os dados do produto enviados pelo formulário
            $request->validate([
                'produto' => 'required',
                'detalhes' => 'required',
                'perecivel' => 'required',
                'quantidadeAtual' => 'required|numeric',
                'quantidadeTotal' => 'required|numeric',
                'precoCompra' => 'required|numeric',
                'precoVenda' => 'required|numeric',
                'dataValidade' => '',
                'fornecedor' => 'required',
                'estoque_id' => 'required',
            ]);

            // Cria um novo produto e popula os campos com os dados do formulário
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
            $produto->estoque_id = $request->input('estoque_id');
            // Salva o produto no banco de dados
            $produto->save();

            event(new ProductCreated($produto, auth()->guard()->user()));


            // Exibe uma mensagem de sucesso e redireciona para o dashboard da empresa
            session()->flash('message', 'Produto criado com sucesso!');
            return redirect()->route('empresa-dashboard');
        }
    }

    // Método para exibir os detalhes de um produto
    public function showproduto($id)
    {
        // Busca o produto pelo ID
        $produto = produtos::find($id);

        // Se o produto não for encontrado, redireciona para o dashboard com uma mensagem de erro
        if (!$produto) {
            return redirect()->route('empresa-dashboard')
                ->with('error', 'Produto nao encontrado.');
        }

        // Exibe a página de detalhes do produto
        return view('livewire.pages.empresas.empresa-detalhes-produto', compact('produto'));
    }

    // Método para exibir a página de edição de um produto
    public function editproduto($id)
    {
        // Busca o produto pelo ID
        $produto = produtos::find($id);
        // Exibe a página de edição do produto
        return view('livewire.pages.empresas.empresa-produto-edit', compact('produto'));
    }

    // Método para atualizar os dados de um produto
    public function updateproduto(Request $request, $id)
    {
        // Busca o produto pelo ID
        $produto = produtos::find($id);

        $original = $produto->getOriginal();
        $descricao = [];
        // Atualiza os dados do produto com os dados do formulário
        $produto->update($request->all());

        //registra a alteração e envia o evento para a tabela de auditoria
        foreach ($produto->getAttributes() as $atributo => $valor) {
            if ($original[$atributo] != $valor && $atributo != 'updated_at') {
                $descricao[] = $atributo . ' alterado de ' . $original[$atributo] . ' para ' . $valor;
            }
        }

        event(new ProductUpdated($produto, auth()->guard()->user(), implode(', ', $descricao), $produto->produto));

        // Redireciona para o dashboard da empresa
        return redirect()->route('empresa-dashboard');
    }

    // Método para excluir um produto
    public function destroyproduto($id)
    {
        // Busca o produto pelo ID
        $produto = produtos::find($id);
        // Exclui o produto do banco de dados
        $produto->delete();

        event(new ProductDeleted($produto, auth()->guard()->user()));
        // Redireciona para o dashboard da empresa
        return redirect()->route('empresa-dashboard');
    }

    // Métodos para manipular estoques

    // Exibe a página de criação de estoque
    public function create()
    {
        return view('livewire.pages.empresas.empresa-estoque-create');
    }

    // Armazena os dados de um novo estoque
    public function store(Request $request)
    {
        // Recupera o ID da empresa associada ao usuário autenticado
        $empresa_id = empresas::where('user_id', auth()->guard()->user()->id)->first()->id;

        // Se o usuário não possui uma empresa, redireciona para a página de login
        if (!$empresa_id) {
            return redirect()->route('login');
        } else {
            // Valida os dados do estoque enviados pelo formulário
            $request->validate([
                'nome' => 'required',
            ]);

            // Cria um novo estoque e popula os campos com os dados do formulário
            $estoque = new estoque();
            $estoque->nome = $request->input('nome');
            $estoque->empresa_id = $empresa_id;
            // Salva o estoque no banco de dados
            $estoque->save();

            // Exibe uma mensagem de sucesso e redireciona para o dashboard da empresa
            session()->flash('message', 'Estoque criado com sucesso!');
            return redirect()->route('empresa-dashboard');
        }
    }

    // Exibe a página de edição de um estoque
    public function edit($id)
    {
        // Busca o estoque pelo ID
        $estoque = estoque::find($id);
        // Exibe a página de edição do estoque
        return view('livewire.pages.empresas.empresa-estoque-edit', compact('estoque'));
    }

    // Atualiza os dados de um estoque
    public function update(Request $request, $id)
    {
        // Busca o estoque pelo ID
        $estoque = estoque::find($id);
        // Atualiza os dados do estoque com os dados do formulário
        $estoque->update($request->all());
        // Redireciona para o dashboard da empresa
        return redirect()->route('empresa-dashboard');
    }

    // Exclui um estoque
    public function destroy($id)
    {
        // Busca o estoque pelo ID
        $estoque = estoque::find($id);
        // Exclui o estoque do banco de dados
        $estoque->delete();
        // Redireciona para o dashboard da empresa
        return redirect()->route('empresa-dashboard');
    }
}
