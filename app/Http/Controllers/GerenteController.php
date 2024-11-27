<?php

namespace App\Http\Controllers;

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
        $user = auth()->guard()->user();
        $empresa = $user->empresa_id;
        $estoques = estoque::where('empresa_id', $empresa)->get();

        return view('livewire.pages.gerentes.gerente-produto-create', compact('estoques'));
        //return view('produto-create');
    }

    public function store(Request $request)
    {
        $user = auth()->guard()->user();
        $empresa = $user->empresa_id;
        $estoque = estoque::where('empresa_id', $empresa)->first();
        $estoque_id = $estoque->id;
        //   dd($estoque_id);

        $request->validate([
            'produto' => 'required',
            'detalhes' => 'required',
            'perecivel' => 'required',
            'quantidadeAtual' => 'required|numeric',
            'quantidadeTotal' => 'required|numeric',
            'precoCompra' => 'required|numeric',
            'precoVenda' => 'required|numeric',
            'dataValidade' => 'required|date',
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

        // Redirecione para a página de produtos
        session()->flash('message', 'Produto inserido com sucesso!');
        return redirect()->route('gerente-dashboard');
    }


    public function show($id)
    {
        $produto = produtos::find($id);

        if (!$produto) {
            return redirect()->route('gerente-dashboard')
                ->with('error', 'Produto não encontrado.');
        }

        return view('livewire.pages.gerentes.DetalhesProdutosGerente', compact('produto'));

    }

    public function edit($id)
    {
        $produto = produtos::find($id);
        //dd($produto);
        return view('livewire.pages.gerentes.gerente-produto-edit', compact('produto'));
    }


    public function update(Request $request, $id)
    {
        $produtos = produtos::find($id);
        $produtos->update($request->all());
        return redirect()->route('gerente-dashboard');
    }


    public function destroy($id)
    {
        // dd($id);
        $produtos = produtos::find($id);
        $produtos->delete();
        return redirect()->route('gerente-dashboard');
    }



}
