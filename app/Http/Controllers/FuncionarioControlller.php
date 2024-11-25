<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\produtos;
use Illuminate\Http\Request;

class FuncionarioControlller extends Controller
{
    //

    public function show($id){
        $produto = produtos::find($id);
        return view('livewire.pages.funcionarios.DetalhesProdutosFuncionario', compact('produto'));
    }

    public function edit($id){
        $produto = produtos::find($id);
        return view('funcionario-produto-edit', compact('produto'));
    }



}
