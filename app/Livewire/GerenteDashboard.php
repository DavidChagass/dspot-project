<?php

namespace App\Livewire;

use Livewire\Component;

class GerenteDashboard extends Component
{
    public function render()
    {
        return view('gerente-dashboard')->layout('layouts.app');
    }
}
