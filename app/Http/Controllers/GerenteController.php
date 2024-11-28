<?php

namespace App\Http\Controllers;

use App\Events\ProductCreated;
use App\Events\ProductDeleted;
use App\Events\ProductUpdated;
use App\Http\Controllers\Controller;
use App\Models\estoque;
use App\Models\gerentes;
use App\Models\produtos;
use Exception;
use Illuminate\Http\Request;

class GerenteController extends Controller
{
    //

    public $estoque_id;

    public function create()
    {
        //pega o usuario autenticado
        $user = auth()->guard()->user();
        $empresa = $user->empresa_id;
        $estoques = estoque::where('empresa_id', $empresa)->get();
        //retorna para a view de criação de produto
        return view('livewire.pages.gerentes.gerente-produto-create', compact('estoques'));
    }

    public function store(Request $request)
    {
        //pega o usuario autenticado
        $user = auth()->guard()->user();
        //procura o id da empresa do gerente
        $empresa = $user->empresa_id;
        //pega o id do estoque
        $estoque = estoque::where('empresa_id', $empresa)->first();
        $estoque_id = $estoque->id;

        //regras para inserir um produto novo
        $request->validate([
            'produto' => 'required',
            'detalhes' => 'required',
            'perecivel' => 'required',
            'quantidadeAtual' => 'required|numeric|lte:quantidadeTotal',//lte não permite que a quant atual seja maior que a total
            'quantidadeTotal' => 'required|numeric',
            'precoCompra' => 'required|numeric',
            'precoVenda' => 'required|numeric',
            'dataValidade' => '',
            'fornecedor' => 'required',
            'estoque_id' => 'required',
        ]);

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
        $produto->estoque_id = $request->input('estoque_id'); //inserindo o id do estoque
        $produto->save();

        event(new ProductCreated($produto, auth()->guard()->user()));

        // Redirecione para a página de produtos
        session()->flash('message', 'Produto inserido com sucesso!');
        return redirect()->route('gerente-dashboard');
    }


    public function show($id)
    {
        //procura o produto pelo id
        $produto = produtos::find($id);
        //caso não encontre o id do produto, redireciona para a dashboard de gerente com o erro de que não encontrou o produto
        if (!$produto) {
            return redirect()->route('gerente-dashboard')
                ->with('error', 'Produto não encontrado.');
        }

        return view('livewire.pages.gerentes.gerente-detalhes-produto', compact('produto'));

    }

    public function edit($id)
    {
        //procura o produto pelo id
        $produto = produtos::find($id);
        //caso não encontre o id do produto, redireciona para a dashboard de gerente com o erro de que não encontrou o produto
        if (!$produto) {
            return redirect()->route('gerente-dashboard')
                ->with('error', 'Produto nao encontrado');
        } else {
            return view('livewire.pages.gerentes.gerente-produto-edit', compact('produto'));
        }
    }


    public function update(Request $request, $id)
    {
        $produtos = produtos::find($id);
        $descricao = [];
        //obtem os valores originais do modelo
        $original = $produtos->getOriginal();

        $request->validate([
            //evita que a quantidade atual seja maior que a total
            'quantidadeAtual' => 'required|numeric|lte:quantidadeTotal',
        ]);
        //atualiza o produto
        $produtos->update($request->all());
        //registra a alteração e envia o evento para a tabela de auditoria
        foreach ($produtos->getAttributes() as $atributo => $valor) {
            if ($original[$atributo] != $valor && $atributo != 'updated_at') {
                $descricao[] = $atributo . ' alterado de ' . $original[$atributo] . ' para ' . $valor;
            }
        }
        event(new ProductUpdated($produtos, auth()->guard()->user(), implode(', ', $descricao)));

        //retorna para a dashboard de gerente
        return redirect()->route('gerente-dashboard');
    }


    public function destroy($id)
    {
        //procura pelo id do produto
        $produtos = produtos::find($id);
        //deleta o produto
        $produtos->delete();


        // Disparar o evento de exclusão de produto
        event(new ProductDeleted($produtos, auth()->guard()->user()));

        return redirect()->route('gerente-dashboard');
    }



}
