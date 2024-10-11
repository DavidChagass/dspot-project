<?php

namespace App\Livewire\Pages\Auth;
use App\Models\empresas;
use Exception;
use Hash;
use Livewire\Component;
use App\Models\User;

class EmpresaRegister extends Component
{

    public $dominio, $nome, $email, $telefone, $password, $password_confirmation;

        protected $rules = [
            'dominio' => 'required|string|max:10|unique:empresas',
            'nome' => 'required|string|max:250',
            'email' => 'required|email|max:20|unique:users',
            'telefone' => 'nullable|string|',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ];


    public function register()
    {
        $this->validate();
        $user = User::create([
            'nome' => $this->nome,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => 'empresa',
        ]);

        $empresa = empresas::create([
            'user_id' => $user->id,
            'dominio' => $this->dominio,
            'telefone' => $this->telefone ?? null,
        ]);


        dd($empresa);
        session()->flash('message', 'Empresa registrada com sucesso!');
        $this->reset();
        return redirect()->route('login.empresa');
    }


    public function render()
    {
        return view('livewire.pages.auth.empresa-register')->layout('layouts.auth-layout');
    }
}
