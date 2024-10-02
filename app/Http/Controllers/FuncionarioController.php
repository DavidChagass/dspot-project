<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\estoque;
use Exception;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{

    public $id, $quantidade;


    public function updateQuantidade()
    {

        $estoque = estoque::findOrFail($this->id);
        if (!$estoque) {
            session()->flash('error', 'produto nao existe');
            return;
        }

        $addQuantidade = estoque::update([
            'quantidadeAtual' => $estoque->quantidade + $this->quantidade,
        ]);

        $removeQuantidade = estoque::update([
            'quantidadeAtual' => $estoque->quantidade - $this->quantidade,
        ]);

        if (!$addQuantidade || !$removeQuantidade) {
            throw new Exception('Erro ao alterar estoque');
        }

    }







}
