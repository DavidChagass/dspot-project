<?php

namespace App\Livewire\Pages\Auth;

use App\Models\empresas;
use Auth;
use Livewire\Component;

class EmpresaLogin extends Component
{

public $dominio,$email,$password;
  public function login()
  {
    $this->validate([
        'email' => 'required|email',
        'password'=> 'required|string|min:8',
        'dominio' => 'required|string|max:10',
    ]);


    $empresa = empresas::where('dominio', $this->dominio)->first();
    if (!$empresa) {
        session()->flash('error', 'erro dominio invalido');
        return;
    }
    if (Auth::guard('empresa')->attempt(['dominio' => $this->dominio,   'email' => $this->email, 'password' => $this->password,])) {
        return redirect()->route('empresa-dashboard');
    }
    session()->flash('error', 'erro credenciais');

  }
    public function render()
    {
        return view('livewire.pages.auth.empresa-login')->layout('layouts.auth-layout');
    }
}
