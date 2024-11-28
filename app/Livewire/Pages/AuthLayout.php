<?php

namespace App\Livewire\Pages;  // Define o namespace para o componente Livewire de layout de autenticação

use Livewire\Component;  // Importa a classe Component do Livewire

class AuthLayout extends Component
{
    // Método responsável por renderizar o layout de autenticação
    public function render()
    {
        return view('livewire.pages.auth-layout');  // Retorna a view 'auth-layout' que será utilizada para o layout de autenticação
    }
}
