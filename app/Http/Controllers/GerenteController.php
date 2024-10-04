<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\estoque;
use App\Models\gerentes;
use Exception;
use Illuminate\Http\Request;

class GerenteController extends Controller
{
    //
    public function inserirEstoque(Request $request)
    {
        $gerenteId = auth('gerente')->id();

        $gerente = gerentes::find($gerenteId);
        $estoque = new Estoque();
        $estoque->empresa_id = $gerente->empresa_id;
        $estoque->produto = $request->input('produto');
        $estoque->detalhes = $request->input('detalhes');
        $estoque->perecivel = $request->input('perecivel');
        $estoque->quantidadeAtual = $request->input('quantidadeAtual');
        $estoque->quantidadeTotal = $request->input('quantidadeTotal');
        $estoque->precoCompra = $request->input('precoCompra');
        $estoque->precoVenda = $request->input('precoVenda');
        $estoque->dataUltimaModificacao = now();
        $estoque->dataValidade = $request->input('dataValidade');
        $estoque->fornecedor = $request->input('fornecedor');
        $estoque->save();

        return redirect()->route('gerente-dashboard')->with('success', 'Estoque inserido com sucesso!');
    }







}
