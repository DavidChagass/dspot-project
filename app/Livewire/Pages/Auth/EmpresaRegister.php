<?php

namespace App\Livewire\Pages\Auth;

use App\Models\empresas;
use Exception;
use Hash;
use Livewire\Component;

class EmpresaRegister extends Component
{

    public $dominio, $nome, $email, $telefone, $password, $passwordconfirm;

    protected $rules = [
        'dominio' => 'required|string|max:10',
        'nome' => 'required|string|max:250',
        'email' => 'required|email|max:250',
        'telefone' => 'required|string|max:250',
        'password' => 'required|string|min:8|confirmed',
        'passwordconfirm' => 'required|string|min:8',
    ];


    public function register()
    {
        if(empty($this->dominio)){
            session()->flash('error', 'O campo dominio é obrigatório');
            return;
        }

        $empresa = empresas::create([
            'dominio' => $this->dominio,
            'nome' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'password' => Hash::make($this->password)
        ]);

        if (!$empresa) {
            throw new Exception('Erro ao criar empresa');
        }
        session()->flash('sucess', 'Empresa inserida');
        return redirect()->route('empresa-dashboard');

    }

    public function render()
    {
        return view('livewire.pages.auth.empresa-register')->layout('layouts.auth-layout');
    }
}
