<?php

namespace App\Livewire;

use App\Models\empresas;
use App\Models\estoque;
use Livewire\Component;

class GerenteDashboard extends Component
{



    public function mostrarProdutos()
    {
        $gerente = auth('web')->user();
        $empresa_id = $gerente->empresa_id;
        $estoques = estoque::where('empresa_id', $empresa_id)->get();
    }



    public function mount()
    {
        $this->mostrarProdutos();
    }


    public function render()
    {
        $estoques = Estoque::with('produtos')->get();

        return view('gerente-dashboard', [
            'estoques' => $estoques,
        ])->layout('layouts.app');
    }

}
