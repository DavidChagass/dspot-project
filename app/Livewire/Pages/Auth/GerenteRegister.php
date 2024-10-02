<?php

namespace App\Livewire;

use App\Models\empresas;
use App\Models\gerentes;
use Exception;
use Hash;
use Livewire\Component;

class GerenteRegister extends Component
{
    public $empresaid, $nome, $email, $telefone, $password, $passwordconfirm;

    //regras para a validação de gerente
    protected $rules = [
        'empresaid' => 'required|interger|exists:empresas,id',
        'nome' => 'required|string|max:250',
        'email' => 'required|string|email|max:250|unique:gerentes,email',
        'telefone' => 'required|string|max:250',
        'password' => 'required|string|min:8|confirmed',
        'passwordconfirm' => 'required|string|min:8|same:password'
    ];

    public function register()
    {
        if (empty($this->telefone)) {
            session()->flash('error', 'O campo telefoneé obrigatório');
            return;
        }

       $empresa = empresas::findOrFail($this->empresaid);

        $gerente = gerentes::create([
            'empresaid' => $this->empresaid,
            'nome' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'password' => Hash::make($this->password)
        ]);
        if (!$gerente) {
            throw new Exception('Erro ao criar gerente');
        }
        session()->flash('sucess', 'Gerente inserido');
        return redirect()->route('gerente-dashboard');

    }



    public function render()
    {
        return view('livewire.gerente-register')->layout('layouts.auth-layout');
    }
}
