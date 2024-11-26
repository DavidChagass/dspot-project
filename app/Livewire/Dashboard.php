<?php

namespace App\Livewire;

use App\Models\Empresas;
use App\Models\Estoque;
use Illuminate\Http\Request;
use Livewire\Component;

class Dashboard extends Component
{
    public $estoques = [];
    public $view;
    public $role;

    public function mount()
    {
        $this->determineRoleAndView();
        $this->mostrarProdutos();
    }

    /**
     * Determina o papel do usuário (role) e a view que será renderizada.
     */
    public function determineRoleAndView()
    {
        $user = auth('web')->user();
        $this->role = $user->role;

        switch ($this->role) {
            case 'gerente':
                $this->view = 'livewire.pages.gerentes.dashboardGerente';
                break;
            case 'funcionario':
                $this->view = 'livewire.pages.funcionarios.dashboardFuncionario';
                break;
            default:
                $this->view = 'livewire.pages.empresas.dashboardEmpresa';
                break;
        }
    }

    /**
     * Mostra os produtos relacionados à empresa do usuário logado.
     */
    /*     public function mostrarProdutos()
        {
            $user = auth('web')->user();
            $empresa_id = $user->empresa_id;

            $estoqueQuery = Estoque::where('empresa_id', $empresa_id);

            if ($this->role === 'gerente') {
                $estoqueQuery->with('produtos'); // Caso seja gerente, incluir os produtos relacionados
            }

            $this->estoques = $estoqueQuery->get();

            if ($this->estoques->isEmpty()) {
                session()->flash('message', 'Nenhum estoque encontrado.');
            }
        }
     */

    public function mostrarProdutos()
    {
        $user = auth('web')->user();

        if ($this->role === 'gerente') {
            $empresa_id = $user->empresa_id;
        }

        if ($this->role === 'empresa') {
            $empresa_id = $user->id;
        }

        $estoqueQuery = Estoque::where('empresa_id', $empresa_id);

        if ($this->role === 'gerente') {
            $estoqueQuery->with('produtos'); // Caso seja gerente, incluir os produtos relacionados
        }

        if ($this->role === 'empresa') {
            $estoqueQuery->with('produtos'); // Incluir os produtos relacionados à empresa
        }

        $estoques = $this->estoques = $estoqueQuery->get();
        $produtos = [];
        foreach ($estoques as $estoque) {
            $produtos = array_merge($produtos, $estoque->produtos->toArray());
        }

        if ($this->estoques->isEmpty()) {
            session()->flash('message', 'Nenhum estoque encontrado.');
        }
    }









    public function AlteraQuantidade(Request $quant)
    {
    }

    public function render()
    {
        /*  return view($this->view, [
             'estoques' => $this->estoques,
         ])->layout('layouts.dashboard', [
                     'title' => $this->getDashboardTitle(),
                 ]); */

        if ($this->role === 'empresa') {
            return view('livewire.pages.empresas.dashboardEmpresa', [
                'estoques' => $this->estoques,
            ])->layout('layouts.dashboard', [
                'title' => $this->getDashboardTitle(),
            ]);
        } else {
            return view($this->view, [
                'estoques' => $this->estoques,
            ])->layout('layouts.dashboard', [
                'title' => $this->getDashboardTitle(),
            ]);
        }
    }

    private function getDashboardTitle()
    {
        switch ($this->role) {
            case 'gerente':
                return 'Dashboard - Gerente';
            case 'funcionario':
                return 'Dashboard - Funcionário';
            default:
                return 'Dashboard - Empresa';
        }
    }
}
