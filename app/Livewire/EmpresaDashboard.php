<?php

namespace App\Livewire;

use Livewire\Component;

class EmpresaDashboard extends Component
{
    public function render()
    {
        return view('empresa-dashboard')->layout('layouts.app');
    }
}
