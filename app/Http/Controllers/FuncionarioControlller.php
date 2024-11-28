<?php

namespace App\Http\Controllers;

use App\Events\ProductUpdated;
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
        //obtem os valores originais do modelo
        $original = $produtos->getOriginal();
        $descricao = [];


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
        event(new ProductUpdated($produtos, auth()->guard()->user(), implode(', ', $descricao), $produtos->produto ));

        return redirect()->route('funcionario-dashboard');
    }


}
