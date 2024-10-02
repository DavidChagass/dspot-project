<?php

namespace App\Livewire\Pages\Auth;

use App\Models\empresas;
use App\Models\funcionarios;
use Auth;
use Livewire\Component;

class FuncionarioLogin extends Component
{


    public $email, $password, $dominio;

    public function login()
    {


        //regras para o login
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
            'dominio' => 'required',
        ]);
        //procura de dominio
        $empresa = empresas::where('dominio', $this->dominio)->first();

        //mensagem de erro caso o dominio nao exista
        if (!$empresa) {
            session()->flash('error', 'erro dominio invalido');
            return;
        }


        //procura de funcionario utilizando email e o id da empresa mostrando somente o primeiro
        $funcionario = funcionarios::where('email', $this->email)
            ->where('empresa_id', $empresa->id)
            ->first();

            //se nao existir o funcionario retorna erro
        if (!$funcionario) {
            session()->flash('error', 'funcionario nao existe');
            return;
        }
        //autentica o funcionario usando o email e senha e retorna para a rota de dashboard
        if (Auth::guard('funcionario')->attempt(['email' => $this->email, 'password' => $this->password,])) {
            return redirect()->route('funcionario-dashboard');
        }


        //retorna erro
        session()->flash('error', 'erro credenciais');


    }

    public function render()
    {
        //renderiza a view de login do funcionario e utiliza de um layout para o login
        return view('livewire.pages.auth.funcionario-login')->layout('layouts.auth-layout');
    }
}
