<?php

namespace App\Livewire\Pages\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Livewire\Component;


class FuncionarioRegister extends Component
{

    //variaveis que recebem os dados
    public $empresa_id, $nome, $email, $telefone, $password, $password_confirmation;


    //regras de validação do funcionario
    protected $rules = [
        'empresa_id' => 'required|integer|exists:empresas,id',//exists: verifica se o id da empresa existe
        'nome' => 'required|string|max:250',
        'email' => 'required|email|max:250|unique:users,email',//unique é utilizado para somente ter um unico email
        'password' => 'required|string|min:8|confirmed',
        'password_confirmation' => 'required|string|min:8',//confirmaçao de senha necessaria para o registro
    ];

    public function register()
    {

        $this->validate();
        $user = User::create([
            'empresa_id' => $this->empresa_id,
            'nome' => $this->nome,
            'email' => $this->email,
            'password' => FacadesHash::make($this->password),
            'role' => 'funcionario',
        ]);



        session()->flash('message', 'funcionario inserido');
        $this->reset();
        return redirect()->route('login');
    }

    public function render()
    {
        //renderiza a view de registro utilizando o layout
        return view('livewire.pages.auth.funcionario-register')->layout('layouts.auth-layout');
    }
}

