<?php

namespace App\Livewire;

use App\Models\empresas;
use App\Models\funcionarios;
use Auth;
use Livewire\Component;

class FuncionarioLogin extends Component
{


    public $email, $password, $dominio;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
            'dominio' => 'required',
        ]);

        $empresa = empresas::where('dominio', $this->dominio)->first();

        if (!$empresa) {
            session()->flash('error', 'erro dominio invalido');
            return;
        }

        $funcionario = funcionarios::where('email', $this->email)
            ->where('empresa_id', $empresa->id)
            ->first();

        if (!$funcionario) {
            session()->flash('error', 'funcionario n existe');
            return;
        }

        if (Auth::guard('funcionario')->attempt(['email' => $this->email, 'password' => $this->password,])) {
            return redirect()->route('dashboard.funcionario');
        }

        session()->flash('error', 'erro credenciais');


    }

    public function render()
    {
        return view('livewire.pages.auth.funcionario-login')->layout('layouts.auth-layout');
    }





}
