<?php

namespace App\Livewire;

use App\Models\empresas;
use App\Models\estoque;
use Livewire\Component;

class GerenteDashboard extends Component
{

    public $produto;

    public function mostrarProdutos()
    {

        $estoques = estoque::with( 'empresas')->get();

        dd($estoques);//retornando null
        $this->produto = Estoque::where('empresa_id', $estoques->empresa_id)
            ->select('produto', 'quantidade', 'detalhes', 'perecivel', 'quantidadeAtual', 'quantidadeTotal', 'precoCompra', 'precoVenda', 'dataValidade', 'fornecedor')
            ->get();
    }

    public function mount()
    {
        $this->mostrarProdutos();
    }


    public function render()
    {
        dd($this->produto, auth('gerente')->id(), auth('empresa')->id());
        return view('gerente-dashboard')->layout('layouts.app');
    }
}
