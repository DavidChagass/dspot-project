<?php

namespace App\Livewire\Pages\Auth;  // Define o namespace do componente para o espaço correto de Livewire Pages

use App\Models\User;  // Importa o modelo de usuário para manipulação de dados
use Illuminate\Support\Facades\Hash as FacadesHash;  // Importa o Facades Hash para o processo de encriptação de senha
use Livewire\Component;  // Importa a classe Component do Livewire

class FuncionarioRegister extends Component
{
    // Variáveis que armazenam os dados do formulário
    public $empresa_id, $nome, $email, $telefone, $password, $password_confirmation;

    // Regras de validação do formulário
    protected $rules = [
        'nome' => 'required|string|max:250',  // Nome é obrigatório, string com no máximo 250 caracteres
        'email' => 'required|email|max:250|unique:users,email',  // Email é obrigatório, deve ser único no banco de dados
        'password' => 'required|string|min:8|confirmed',  // Senha é obrigatória, deve ter pelo menos 8 caracteres e ser confirmada
        'password_confirmation' => 'required|string|min:8',  // Campo de confirmação de senha
    ];

    // Método que é chamado quando o formulário é submetido
    public function register()
    {
        $empresa_id = auth()->guard()->user()->empresa_id;  // Obtém o ID da empresa do usuário logado

        $this->validate();  // Valida os dados do formulário

        // Cria um novo usuário com os dados recebidos do formulário
        $user = User::create([
            'empresa_id' => $empresa_id,  // Define o ID da empresa
            'nome' => $this->nome,  // Nome do usuário
            'email' => $this->email,  // Email do usuário
            'password' => FacadesHash::make($this->password),  // Encripta a senha
            'role' => 'funcionario',  // Define o papel do usuário como 'funcionario'
        ]);

        // Mensagem de confirmação para o usuário
        session()->flash('message', 'Funcionario inserido');

        // Reseta os campos do formulário
        $this->reset();

        // Redireciona para a página de dashboard do gerente
        return redirect()->route('gerente-dashboard');
    }

    public function render()
    {
        // Renderiza a view de registro utilizando o layout correto
        return view('livewire.pages.funcionarios.funcionario-register')->layout('layouts.auth-layout');
    }
}
