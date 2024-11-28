<?php

namespace App\Livewire;  // Define o namespace para o componente Livewire do Dashboard do Funcionário

use Livewire\Component;  // Importa a classe Component do Livewire
use Request;  // Importa a classe Request (não está sendo utilizada diretamente no código)

class FuncionarioDashboard extends Component
{
    // Método responsável por alterar a quantidade de algum item (a lógica não está implementada)
    public function AlteraQuantidade(Request $quant)
    {
    }

    // Método responsável por renderizar a view do dashboard do funcionário
    public function render()
    {
        return view('funcionario-dashboard')->layout('layouts.app');  // Renderiza a view 'funcionario-dashboard' com o layout 'layouts.app'
    }
}
