<?php

namespace App\Livewire\Pages\Auth;
use App\Models\empresas;
use Exception;
use Hash;
use Illuminate\Support\Facades\DB;
use App\Models\funcionarios;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Validator;

class FuncionarioRegister extends Component
{

    //variaveis que recebem os dados
    public $empresaid, $nome, $email, $telefone, $password, $passwordconfirm;


    //regras de validação do funcionario
    protected $rules = [
        'empresaid' => 'required|integer|exists:empresas,id',//exists: verifica se o id da empresa existe
        'nome' => 'required|string|max:250',
        'email' => 'required|email|max:250|unique:funcionarios,email',//unique é utilizado para somente ter um unico email
        'telefone' => 'required|string|max:250',
        'password' => 'required|string|min:8|confirmed',
        'passwordconfirm' => 'required|string|min:8|same:password'//confirmaçao de senha necessaria para o registro
    ];

    public function register()
    {
        //verifica se o campo de telefone esta vazio e exibe erro
        if (empty($this->telefone)) {
            session()->flash('error', 'O campo telefone é obrigatório');
            return;
        }

        //procura o id de uma empresa
        $empresa = empresas::findOrFail($this->empresaid);


        //criaçao de registro de um funcionario
        $funcionario = funcionarios::create([
            'empresa_id' => $this->empresaid,
            'nome' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'password' => Hash::make($this->password)//criptografa a senha
        ]);
            // se houver algum erro geral sobre o funcionario retorna um erro
        if (!$funcionario) {
            throw new Exception('Erro ao criar funcionário');
        }
        //se completa o registro exibe tal mensagem e envia para a dashboard do funcionario
        session()->flash('sucess', 'funcionario inserido');
        return redirect()->route('funcionario-dashboard');
    }

    public function render()
    {
        //renderiza a view de registro utilizando o layout
        return view('livewire.pages.auth.funcionario-register')->layout('layouts.auth-layout');
    }
}

