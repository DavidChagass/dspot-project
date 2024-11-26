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


    public function show($id){
        $produto = produtos::find($id);
        return view('livewire.pages.empresas.DetalhesProdutosEmpresa', compact('produto'));
    }


}
