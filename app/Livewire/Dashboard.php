<?php

namespace App\Livewire;

use App\Models\Empresas;
use App\Models\Estoque;
use Livewire\Component;

class Dashboard extends Component
{
    public $estoques = [];
    public $view;

    public function mount()
    {
        $this->determineView();
        $this->mostrarProdutos();
    }

    /**
     * Determina qual view será renderizada (Empresa ou Gerente)
     */
    public function determineView()
    {
        $user = auth('web')->user();

        if ($user->role === 'gerente') {
            $this->view = 'livewire.pages.auth.dashboardGerente';
        } else {
            $this->view = 'livewire.pages.auth.dashboardEmpresa';
        }
    }

    /**
     * Mostra os produtos relacionados à empresa do usuário logado.
     */
    public function mostrarProdutos()
    {
        $user = auth('web')->user();
        $empresa_id = $user->empresa_id;

        $estoqueQuery = Estoque::where('empresa_id', $empresa_id);

        if ($user->role === 'gerente') {
            $estoqueQuery->with('produtos'); // Caso seja gerente, incluir os produtos relacionados
        }

        $this->estoques = $estoqueQuery->get();

        if ($this->estoques->isEmpty()) {
            session()->flash('message', 'Nenhum estoque encontrado.');
        }
    }

    public function render()
    {
        return view($this->view, [
            'estoques' => $this->estoques,
        ])->layout('layouts.dashboard', [
            'title' => $this->view === 'livewire.pages.auth.dashboardGerente'
                ? 'Dashboard - Gerente'
                : 'Dashboard - Empresa',
        ]);
    }
}