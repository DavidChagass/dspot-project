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

        $estoqsues = estoque::where('empresa_id', $empresa_id)->get();


    }
    /*
            $estoque = Estoque::with('empresas')->where('empresa_id', $empresa_id)
                ->get();
            // dd($estoque);

            if ($estoque) {
                foreach ($estoque as $estoqueIndividual) {
                    $this->produto = Estoque::where('empresa_id', '=', $estoqueIndividual->id)
                        ->select(
                            'empresa_id',
                            'produto',
                            'quantidade',
                            'detalhes',
                            'perecivel',
                            'quantidadeAtual',
                            'quantidadeTotal',
                            'precoCompra',
                            'precoVenda',
                            'dataValidade',
                            'fornecedor'
                        )
                        ->get();
                }

            } else {
                dd('Nenhum estoque encontrado');
            } */


    //  dd($this->produto);


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
