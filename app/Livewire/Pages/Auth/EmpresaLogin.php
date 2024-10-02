<?php

namespace App\Livewire;

use App\Models\empresas;
use Auth;
use Livewire\Component;

class EmpresaLogin extends Component
{
//DOMINIO EMAIL PASSWORD
public $dominio,$email,$password;
  public function login()
  {
    $this->validate([
        'email' => 'required|email',
        'password'=> 'required|',
        'dominio' => 'required'
    ]);


    $empresa = empresas::where('dominio', $this->dominio)->first();
    if (!$empresa) {
        session()->flash('error', 'erro dominio invalido');
        return;
    }


    if (!$empresa) {
        session()->flash('error', 'empresa nao existe');
        return;
    }

    if (Auth::guard('empresa')->attempt(['email' => $this->email, 'password' => $this->password,])) {
        return redirect()->route('empresa-dashboard');
    }
    session()->flash('error', 'erro credenciais');

  }
    public function render()
    {
        return view('livewire.empresa-login');
    }
}
