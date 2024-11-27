<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\produtos;
use Illuminate\Http\Request;

class FuncionarioControlller extends Controller
{
    //

    public function show($id)
    {
        $produto = produtos::find($id);
        return view('livewire.pages.funcionarios.funcionario-detalhes-produto', compact('produto'));
    }

    public function edit($id)
    {
        $produto = produtos::find($id);
        return view('livewire.pages.funcionarios.funcionario-produto-edit', compact('produto'));
    }

    public function update(Request $request, $id)
    {
        $produtos = produtos::find($id);
        $request->validate([
            'quantidadeAtual' => 'required|numeric|lte:quantidadeTotal',
        ]);
        $produtos->update($request->all());
        return redirect()->route('funcionario-dashboard');
    }


}
