<?php

namespace App\Livewire;  // Define o namespace para o componente Livewire do Dashboard

use App\Models\auditoria;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Empresas;  // Importa o modelo de Empresas
use App\Models\Estoque;  // Importa o modelo de Estoque
use App\Models\produtos;
use Illuminate\Http\Request;  // Importa a classe Request para manipulação de requisições HTTP (não está sendo utilizada diretamente)
use Livewire\Component;  // Importa a classe Component do Livewire

class Dashboard extends Component
{

    public $estoques = [];  // Variável para armazenar os estoques
    public $funcionarios = [];  // Variável para armazenar os funcionarios
    public $view;  // Variável para armazenar o nome da view a ser renderizada
    public $role;  // Variável para armazenar o papel (role) do usuário
    public $funcionariosCount = 0; // Propriedade para armazenar o número de funcionários
    public $produtosCount = 0; // Propriedade para armazenar a contagem de tipos de produtos
    public $estoquesCount = 0; // Propriedade para armazenar a contagem de estoques
    public $quantidadeTotalAtual = 0; // Propriedade para armazenar a soma de quantidadeAtual
    public $pereciveisCount = 0; // Propriedade para armazenar a soma de produtos perecíveis
    public $lucroTotal = 0; // Propriedade para armazenar o total de lucro

    // Método chamado ao montar o componente
    public function mount()
    {
        $this->determineRoleAndView();  // Determina o papel do usuário e a view a ser exibida
        $this->mostrarProdutos();  // Exibe os produtos relacionados ao usuário logado
        // $this->buscarEventos();  Busca os eventos relacionados ao usuário logado
        $this->mostrarFuncionarios();
        $this->funcionariosCount = $this->contarFuncionarios(); // Conta os funcionários
        $this->estoquesCount = $this->contarEstoques(); // Inicializa a contagem de estoques
        $this->produtosCount = $this->contarTiposDeProdutos(); // Inicializa a contagem de tipos de produtos
        $this->quantidadeTotalAtual = $this->somarQuantidadeAtualDeProdutos(); // Soma as quantidades
        $this->pereciveisCount = $this->contarProdutosPereciveis(); // Conta os produtos perecíveis
        $this->lucroTotal = $this->calcularLucroProdutos(); // Inicializa o cálculo de lucro
    }

    public function calcularLucroProdutos()
    {
        $user = auth('web')->user(); // Obtém o usuário autenticado

        // Determina o ID da empresa com base no papel do usuário
        if ($this->role === 'empresa') {
            $empresa_id = Empresas::where('user_id', $user->id)->first()->id;
        } elseif (in_array($this->role, ['gerente', 'funcionario'])) {
            $empresa_id = $user->empresa_id;
        } else {
            return 0; // Retorna 0 se o papel não for válido
        }

        // Soma a diferença entre precoVenda e precoCompra para todos os produtos da empresa
        $lucroTotal = DB::table('produtos')
            ->join('estoque', 'produtos.estoque_id', '=', 'estoque.id') // Relaciona produtos com estoques
            ->where('estoque.empresa_id', $empresa_id) // Filtra pelo ID da empresa
            ->sum(DB::raw('(produtos.precoVenda - produtos.precoCompra) * produtos.quantidadeAtual')); // Soma a diferença

        // Formata o valor para 2 casas decimais e retorna
        return number_format($lucroTotal, 2, '.', '');
    }

    /**
     * Conta o número de produtos perecíveis em estoque empresa do usuário.
     */
    public function contarProdutosPereciveis()
    {
        $user = auth('web')->user(); // Obtém o usuário autenticado

        // Determina o ID da empresa com base no papel do usuário
        if ($this->role === 'empresa') {
            $empresa_id = Empresas::where('user_id', $user->id)->first()->id;
        } elseif (in_array($this->role, ['gerente', 'funcionario'])) {
            $empresa_id = $user->empresa_id;
        } else {
            return 0; // Retorna 0 se o papel não for válido
        }

        // Soma o campo quantidadeAtual onde perecivel é 1 (sim) para produtos relacionados à empresa
        return DB::table('produtos')
            ->join('estoque', 'produtos.estoque_id', '=', 'estoque.id') // Relaciona produtos com estoques
            ->where('estoque.empresa_id', $empresa_id) // Filtra pelo ID da empresa
            ->where('produtos.perecivel', 1) // Filtra apenas produtos perecíveis
            ->sum('produtos.quantidadeAtual'); // Soma o campo quantidadeAtual
    }

    /**
     * Conta o número de tipos de produtos cadastrados na empresa do usuário.
     */
    public function contarTiposDeProdutos()
    {
        $user = auth('web')->user(); // Obtém o usuário autenticado

        // Determina o ID da empresa com base no papel do usuário
        if ($this->role === 'empresa') {
            $empresa_id = Empresas::where('user_id', $user->id)->first()->id;
        } elseif (in_array($this->role, ['gerente', 'funcionario'])) {
            $empresa_id = $user->empresa_id;
        } else {
            return 0; // Papel não correspondente
        }

        // Conta os tipos de produtos distintos associados à empresa
        return DB::table('produtos')
            ->join('estoque', 'produtos.estoque_id', '=', 'estoque.id') // Relaciona produtos com estoques
            ->where('estoque.empresa_id', $empresa_id) // Filtra pelo ID da empresa
            ->distinct('produtos.produto') // Conta tipos únicos de produtos
            ->count('produtos.produto'); // Conta os tipos distintos
    }

    public function somarQuantidadeAtualDeProdutos()
    {
        $user = auth('web')->user(); // Obtém o usuário autenticado

        // Determina o ID da empresa com base no papel do usuário
        if ($this->role === 'empresa') {
            $empresa_id = Empresas::where('user_id', $user->id)->first()->id;
        } elseif (in_array($this->role, ['gerente', 'funcionario'])) {
            $empresa_id = $user->empresa_id;
        } else {
            return 0; // Retorna 0 se o papel não for válido
        }

        // Soma o campo quantidadeAtual de todos os produtos relacionados à empresa
        return DB::table('produtos')
            ->join('estoque', 'produtos.estoque_id', '=', 'estoque.id') // Relaciona produtos com estoques
            ->where('estoque.empresa_id', $empresa_id) // Filtra pelo ID da empresa
            ->sum('produtos.quantidadeAtual'); // Soma o campo quantidadeAtual
    }

    public function mostrarFuncionarios()
    {
        $user = auth('web')->user(); // Obtém o usuário autenticado

        if ($this->role === 'funcionario') {
            return; // Sai do método
        }

        // Define o ID da empresa com base no papel do usuário
        if ($this->role === 'empresa') {
            // Para empresas, exibe gerentes e funcionários associados à empresa
            $empresa_id = Empresas::where('user_id', $user->id)->first()->id;
            $this->funcionarios = User::where('empresa_id', $empresa_id)
                ->whereIn('role', ['gerente', 'funcionario']) // Filtra gerentes e funcionários
                ->get();
        } elseif ($this->role === 'gerente') {
            // Para gerentes, exibe apenas os funcionários associados à mesma empresa
            $empresa_id = $user->empresa_id;
            $this->funcionarios = User::where('empresa_id', $empresa_id)
                ->where('role', 'funcionario') // Filtra apenas funcionários
                ->get();
        } else {
            $this->funcionarios = []; // Papel não correspondente
        }

        // Exibe uma mensagem se não houver funcionários encontrados
        if ($this->funcionarios->isEmpty()) {
            session()->flash('message', 'Nenhum funcionário encontrado.');
        }
    }

    public function contarEstoques()
    {
        $user = auth('web')->user(); // Obtém o usuário autenticado

        // Define o ID da empresa com base no papel do usuário
        if ($this->role === 'empresa') {
            $empresa_id = Empresas::where('user_id', $user->id)->first()->id;
        } elseif (in_array($this->role, ['gerente', 'funcionario'])) {
            $empresa_id = $user->empresa_id;
        } else {
            return 0; // Retorna 0 se o papel não for válido
        }

        // Conta os estoques associados à empresa
        return Estoque::where('empresa_id', $empresa_id)->count();
    }

    /**
     * Conta o número de funcionários e gerentes com base no papel do usuário.
     */
    public function contarFuncionarios()
    {
        $user = auth('web')->user(); // Obtém o usuário autenticado

        if ($this->role === 'empresa') {
            // Para empresas, conta gerentes e funcionários da mesma empresa
            $empresa_id = Empresas::where('user_id', $user->id)->first()->id;
            $count = User::where('empresa_id', $empresa_id)
                ->whereIn('role', ['gerente', 'funcionario']) // Filtra gerentes e funcionários
                ->count();
        } elseif ($this->role === 'gerente') {
            // Para gerentes, conta apenas os funcionários da mesma empresa
            $empresa_id = $user->empresa_id;
            $count = User::where('empresa_id', $empresa_id)
                ->where('role', 'funcionario') // Filtra apenas funcionários
                ->count();
        } else {
            $count = 0; // Papel não correspondente
        }

        return $count;
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
                'funcionarios' => $this->funcionarios, // Passa os funcionários para a view
            ])->layout('layouts.dashboard', [
                'title' => $this->getDashboardTitle(),
            ]);
        } else {
            return view($this->view, [
                'estoques' => $this->estoques,
                'funcionarios' => $this->funcionarios, // Passa os funcionários para a view
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
