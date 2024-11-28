<?php

namespace App\Livewire\Pages\Auth;  // Define o namespace para o componente Livewire de logout de gerente

use Livewire\Component;  // Importa a classe Component do Livewire

class GerenteLogout extends Component
{
    // Método que renderiza a view de logout para o gerente
    public function render()
    {
        return view('livewire.pages.gerentes.gerente-logout');  // Retorna a view de logout específica para o gerente
    }
}
