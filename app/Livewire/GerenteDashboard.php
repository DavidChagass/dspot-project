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
        $gerente = auth('gerente')->user();
        $empresa_id = $gerente->empresa_id;


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
        }


      //  dd($this->produto);

    }

    public function mount()
    {
        $this->mostrarProdutos();
    }


    public function render()
    {
        //  dd($this->produto, auth('gerente')->id(), auth('empresa')->id());
        return view('gerente-dashboard')->layout('layouts.app');
    }
}
