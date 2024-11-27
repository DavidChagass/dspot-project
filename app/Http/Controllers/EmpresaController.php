<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\empresas;
use App\Models\estoque;
use App\Models\produtos;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    //
    public $estoque_id;

    public function createproduto()
    {
        $empresa_id = empresas::where('user_id', auth()->guard()->user()->id)->first()->id;
        if (!$empresa_id) {
            return redirect()->route('empresa-dashboard');
        } else {
            $estoques = estoque::where('empresa_id', $empresa_id)->get();
            return view('livewire.pages.empresas.empresa-produto-create', compact('estoques'));
        }
    }

    public function storeproduto(Request $request)
    {
        $empresa_id = empresas::where('user_id', auth()->guard()->user()->id)->first()->id;
        if (!$empresa_id) {
            return redirect()->route('login');
        } else {
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
            $produto->estoque_id = $request->input('estoque_id');
            $produto->save();

            session()->flash('message', 'Produto criado com sucesso!');
            return redirect()->route('empresa-dashboard');
        }
    }

    public function showproduto($id)
    {
        $produto = produtos::find($id);
        if (!$produto) {
            return redirect()->route('empresa-dashboard')
                ->with('error', 'Produto nao encontrado.');
        }
        return view('livewire.pages.empresas.empresa-detalhes-produto', compact('produto'));
    }

    public function editproduto($id)
    {
        $produto = produtos::find($id);
        return view('livewire.pages.empresas.empresa-produto-edit', compact('produto'));
    }

    public function updateproduto(Request $request, $id)
    {
        $produto = produtos::find($id);
        $produto->update($request->all());
        return redirect()->route('empresa-dashboard');
    }


    public function destroyproduto($id)
    {
        $produto = produtos::find($id);
        $produto->delete();
        return redirect()->route('empresa-dashboard');

    }



    //rotas de estoque
    public function create()
    {
        return view('livewire.pages.empresas.empresa-estoque-create');
    }

    public function store(Request $request)
    {
        $empresa_id = empresas::where('user_id', auth()->guard()->user()->id)->first()->id;
        //dd($empresa_id);
        if (!$empresa_id) {
            return redirect()->route('login');
        } else {
            $request->validate([
                'nome' => 'required',
            ]);
            $estoque = new estoque();
            $estoque->nome = $request->input('nome');
            $estoque->empresa_id = $empresa_id;
            $estoque->save();

            session()->flash('message', 'Estoque criado com sucesso!');
            return redirect()->route('empresa-dashboard');
        }
    }

    public function edit($id)
    {
        $estoque = estoque::find($id);
        return view('livewire.pages.empresas.empresa-estoque-edit', compact('estoque'));
    }

    public function update(Request $request, $id)
    {
        $estoque = estoque::find($id);
        $estoque->update($request->all());
        return redirect()->route('empresa-dashboard');
    }

    public function destroy($id)
    {
        $estoque = estoque::find($id);
        $estoque->delete();
        return redirect()->route('empresa-dashboard');
    }


}
