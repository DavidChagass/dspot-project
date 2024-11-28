<?php

namespace App\View\Components;

use Illuminate\View\Component;  // Importa a classe base para os componentes de view no Laravel
use Illuminate\View\View;  // Importa a classe para trabalhar com a view

class AppLayout extends Component  // Define a classe AppLayout, que estende a classe Component do Laravel
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View  // Método render retorna a view que representa este componente
    {
        return view('layouts.app');  // Retorna a view 'layouts.app', onde a estrutura principal do layout está definida
    }
}
