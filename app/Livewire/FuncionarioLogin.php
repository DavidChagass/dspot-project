<?php

namespace App\Livewire;

use App\Models\empresas;
use App\Models\funcionarios;
use Auth;
use Livewire\Component;

class FuncionarioLogin extends Component
{


    public $email, $senha, $dominio;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'senha' => 'required',
            'dominio' => 'required',
        ]);

        $empresa = empresas::where('dominio', $this->dominio)->first();

        if (!$empresa) {
            session()->flash('error', 'erro dominio');
            return;
        }

        if (Auth::guard('funcionario')->attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->route('dashboard.funcionario');
        }
        session()->flash('error', 'credenciais invalidas.');

    }

    public function render()
    {
        return view('livewire.pages.auth.funcionario-login')->layout('layouts.auth-layout');
    }





}
