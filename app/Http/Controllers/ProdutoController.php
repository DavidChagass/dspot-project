<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\produtos;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{



    public function create()
    {
        return view('produto-create');
    }

    public function store(Request $request)
    {
        //dd('bom dia');
      //  dd($request);
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

      //  dd($request->all());
        // Insira o produto no banco de dados
        produtos::create($request->all());


        // Redirecione para a página de produtos
        session()->flash('message', 'Produto inserido com sucesso!');
        return redirect()->route('gerente-dashboard');
    }


}
