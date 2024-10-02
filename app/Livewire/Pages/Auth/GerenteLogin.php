<?php

namespace App\Livewire;

use App\Models\empresas;
use App\Models\gerentes;
use Auth;
use Livewire\Component;

class GerenteLogin extends Component
{

    public $email, $password, $dominio;
    public function login(){
        $this->validate([
            'email' => 'required|email',
            'password'=> 'required|',
            'dominio' => 'required'
        ]);

        $empresa = empresas::where('dominio', $this->dominio)->first();
        if(!$empresa){
            session()->flash('error', 'dominio invalido');
            return;
        }

        $gerente = gerentes::where('email', $this->email)
        ->where('empresaid', $empresa->id)
        ->first();


        if(!$gerente){
            session()->flash('error', 'gerente nao existe');
            return;
        }

        if(Auth::guard('gerente')->attempt(['email' => $this->email, 'password' => $this->password])){

            return redirect()->route('gerente-dashboard');
        }


        //se o login for invalido retorna o erro
        session()->flash('error', 'login invalido');

    }

    public function render()
    {
        return view('livewire.gerente-login')->layouts('layouts.auth-layout');
    }
}
