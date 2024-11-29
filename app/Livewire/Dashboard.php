<?php

namespace App\Livewire;  // Define o namespace para o componente Livewire do Dashboard

use App\Models\auditoria;
use App\Models\Empresas;  // Importa o modelo de Empresas
use App\Models\Estoque;  // Importa o modelo de Estoque
use Illuminate\Http\Request;  // Importa a classe Request para manipulação de requisições HTTP (não está sendo utilizada diretamente)
use Livewire\Component;  // Importa a classe Component do Livewire

class Dashboard extends Component
{

    public $estoques = [];  // Variável para armazenar os estoques
    public $view;  // Variável para armazenar o nome da view a ser renderizada
    public $role;  // Variável para armazenar o papel (role) do usuário

    // Método chamado ao montar o componente
    public function mount()
    {
        $this->determineRoleAndView();  // Determina o papel do usuário e a view a ser exibida
        $this->mostrarProdutos();  // Exibe os produtos relacionados ao usuário logado

    }



    /**
     * Determina o papel do usuário (role) e a view que será renderizada.
     */
    public function determineRoleAndView()
    {
        $user = auth('web')->user();  // Obtém o usuário autenticado
        $this->role = $user->role;  // Atribui o papel (role) do usuário

        // Define a view com base no papel do usuário
        switch ($this->role) {
            case 'gerente':
                $this->view = 'livewire.pages.gerentes.dashboardGerente';  // Para gerentes
                break;
            case 'funcionario':
                $this->view = 'livewire.pages.funcionarios.dashboardFuncionario';  // Para funcionários
                break;
            default:
                $this->view = 'livewire.pages.empresas.dashboardEmpresa';  // Para empresas
                break;
        }
    }

    /**
     * Mostra os produtos relacionados à empresa do usuário logado.
     */
    public function mostrarProdutos()
    {
        $user = auth('web')->user();  // Obtém o usuário autenticado

        // Define o ID da empresa com base no papel do usuário
        if ($this->role === 'gerente' || $this->role === 'funcionario') {
            $empresa_id = $user->empresa_id;  // Para gerentes e funcionários, usa o ID da empresa do usuário
        }

        if ($this->role === 'empresa') {
            $empresa_id = Empresas::where('user_id', auth()->guard()->user()->id)->first()->id;  // Para empresas, obtém o ID da empresa com base no usuário
        }

        // Cria uma query para buscar os estoques da empresa
        $estoqueQuery = Estoque::where('empresa_id', $empresa_id);

        // Inclui os produtos associados a cada estoque, dependendo do papel do usuário
        if (in_array($this->role, ['gerente', 'empresa', 'funcionario'])) {
            $estoqueQuery->with('produtos');  // Para todos, inclui os produtos associados
        }

        // Obtém os estoques e associa aos produtos
        $estoques = $this->estoques = $estoqueQuery->get();
        $produtos = [];  // Variável para armazenar os produtos

        foreach ($estoques as $estoque) {
            $produtos = array_merge($produtos, $estoque->produtos->toArray());  // Adiciona os produtos de cada estoque
        }

        // Exibe uma mensagem se não houver estoques encontrados
        if ($this->estoques->isEmpty()) {
            session()->flash('message', 'Nenhum estoque encontrado.');
        }
    }

    // Método responsável por renderizar a view com os dados
    public function render()
    {
        // Renderiza a view com o layout apropriado, dependendo do papel do usuário
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

    // Método privado para definir o título do dashboard com base no papel do usuário
    private function getDashboardTitle()
    {
        switch ($this->role) {
            case 'gerente':
                return 'Dashboard - Gerente';  // Título para gerentes
            case 'funcionario':
                return 'Dashboard - Funcionário';  // Título para funcionários
            default:
                return 'Dashboard - Empresa';  // Título para empresas
        }
    }
}
