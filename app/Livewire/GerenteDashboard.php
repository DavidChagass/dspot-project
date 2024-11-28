<?php

namespace App\Livewire;  // Define o namespace para o componente Livewire do Dashboard do Gerente

use App\Models\empresas;  // Importa o modelo de Empresas
use App\Models\estoque;  // Importa o modelo de Estoque
use Livewire\Component;  // Importa a classe Component do Livewire

class GerenteDashboard extends Component
{
    // Método responsável por mostrar os produtos (não está retornando os dados ao componente)
    public function mostrarProdutos()
    {
        $gerente = auth('web')->user();  // Obtém o gerente autenticado
        $empresa_id = $gerente->empresa_id;  // Obtém o ID da empresa associada ao gerente
        $estoques = estoque::where('empresa_id', $empresa_id)->get();  // Consulta os estoques da empresa do gerente
    }

    // Método chamado ao montar o componente
    public function mount()
    {
        $this->mostrarProdutos();  // Chama o método para mostrar os produtos ao montar o componente
    }

    // Método responsável por renderizar a view do dashboard do gerente
    public function render()
    {
        $estoques = Estoque::with('produtos')->get();  // Consulta os estoques com os produtos associados

        // Renderiza a view 'gerente-dashboard' passando os estoques como dados
        return view('gerente-dashboard', [
            'estoques' => $estoques,
        ])->layout('layouts.app');  // Usa o layout 'layouts.app' para renderizar o conteúdo
    }
}
