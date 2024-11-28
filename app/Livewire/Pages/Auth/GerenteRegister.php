<?php

namespace App\Livewire\Pages\Auth;  // Define o namespace para o componente Livewire de registro do gerente

use App\Models\empresas;  // Importa o modelo de empresas
use App\Models\User;  // Importa o modelo de usuário
use Illuminate\Support\Facades\Hash as FacadesHash;  // Importa o Facade Hash para encriptação de senha
use Livewire\Component;  // Importa a classe Component do Livewire

class GerenteRegister extends Component
{
    // Variáveis que armazenam os dados do formulário
    public $empresa_id, $nome, $email, $telefone, $password, $password_confirmation;

    // Regras de validação do formulário de gerente
    protected $rules = [
        'nome' => 'required|string|max:250',  // Nome é obrigatório, tipo string e com no máximo 250 caracteres
        'email' => 'required|string|email|max:250|unique:users,email',  // Email é obrigatório, válido e único no banco
        'password' => 'required|string|min:8|confirmed',  // Senha obrigatória, com no mínimo 8 caracteres e confirmada
        'password_confirmation' => 'required|string|min:8',  // Confirmação de senha é obrigatória e com no mínimo 8 caracteres
    ];

    // Método chamado ao submeter o formulário para registrar o gerente
    public function register()
    {
        $this->validate();  // Valida os dados do formulário

        // Obtém o ID da empresa associada ao usuário autenticado
        $empresa_id = empresas::where('user_id', auth()->guard()->user()->id)->first()->id;

        // Cria um novo usuário com os dados fornecidos no formulário
        $user = User::create([
            'empresa_id' => $empresa_id,  // Atribui o ID da empresa
            'nome' => $this->nome,  // Nome do gerente
            'email' => $this->email,  // Email do gerente
            'password' => FacadesHash::make($this->password),  // Senha encriptada
            'role' => 'gerente',  // Define o papel como 'gerente'
        ]);

        // Exibe uma mensagem de sucesso após a inserção do gerente
        session()->flash('message', 'gerente inserido');

        // Reseta os campos do formulário
        $this->reset();

        // Redireciona para o painel de controle da empresa
        return redirect()->route('empresa-dashboard');
    }

    // Método para renderizar a view de registro de gerente
    public function render()
    {
        return view('livewire.pages.gerentes.gerente-register')->layout('layouts.auth-layout');
    }

    // Método que é executado ao montar o componente
    public function mount()
    {
        // Inicializa o ID da empresa com o valor do usuário autenticado
        $this->empresa_id = auth()->guard()->user()->empresa_id;
    }
}
