<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\empresas;
use App\Models\estoque;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    //
 public   $estoque_id;

    public function create()
    {
        return view('livewire.pages.empresas.empresa-estoque-create');
    }

    public function store(Request $request){
        $empresa_id = empresas::where('user_id', auth()->guard()->user()->id)->first()->id;
        //dd($empresa_id);

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

/*     public function show($id){
        $estoque = estoque::find($id);
        return view('livewire.pages.empresas.empresa-estoque-show', compact('estoque'));
    }
 */

public function mostrarProduto($id){

 $empresa_id = empresas::where('user_id', auth()->guard()->user()->id)->first()->id;
    $estoques = estoque::where('empresa_id', $empresa_id)->get();
    $produtos = [];

    foreach ($estoques as $estoque) {
        $produtos[] = $estoque->produtos;
    }

    return view('livewire.pages.empresas.dashboardEmpresa', compact('estoques', 'produtos'));
}



}
