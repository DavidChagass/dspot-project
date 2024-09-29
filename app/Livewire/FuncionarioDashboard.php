<?php

namespace App\Livewire;

use Livewire\Component;
use Request;

class FuncionarioDashboard extends Component
{

    public function AlteraQuantidade(Request $quant)
    {
    }

    public function render()
    {
        return view('funcionario-dashboard')->layout('layouts.app');
    }
}
