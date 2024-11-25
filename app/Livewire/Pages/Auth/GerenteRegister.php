<?php

namespace App\Livewire\Pages\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Livewire\Component;

class GerenteRegister extends Component
{
    public $empresa_id, $nome, $email, $telefone, $password, $password_confirmation;

    //regras para a validação de gerente
    protected $rules = [
        'nome' => 'required|string|max:250',
        'email' => 'required|string|email|max:250|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'password_confirmation' => 'required|string|min:8',

    ];
    public function register()
    {
        $this->validate();
        //$empresa_id = auth()->guard()->user()->empresa_id;

        $empresa_id = auth()->guard()->user('empresa')->id;
       // dd($this->validate());



        $user = User::create([
            'empresa_id' => $empresa_id,
            'nome' => $this->nome,
            'email' => $this->email,
            'password' => FacadesHash::make($this->password),
            'role' => 'gerente',
        ]);
        //dd($user);
        session()->flash('message', 'gerente inserido');
        $this->reset();
        return redirect()->route('empresa-dashboard');

    }

    public function render()
    {
        return view('livewire.pages.auth.gerente-register')->layout('layouts.auth-layout');
    }

    public function mount(){
        $this->empresa_id = auth()->guard()->user()->empresa_id;
    }
}
