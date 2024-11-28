<?php

namespace App\View\Components;

use Illuminate\View\Component;  // Importa a classe base para componentes de view no Laravel
use Illuminate\View\View;  // Importa a classe para trabalhar com views no Laravel

class GuestLayout extends Component  // Define a classe GuestLayout, que estende a classe Component do Laravel
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View  // Método render retorna a view que representa este componente
    {
        return view('layouts.guest');  // Retorna a view 'layouts.guest', que define o layout para visitantes
    }
}
