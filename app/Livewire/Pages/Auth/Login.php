<?php

namespace App\Livewire\Pages\Auth;  // Define o namespace para o componente Livewire de login

use App\Models\empresas;  // Importa o modelo de empresas
use App\Models\User;  // Importa o modelo de usuário
use Illuminate\Http\Request;  // Importa a classe Request para manipulação de requisições HTTP
use Illuminate\Support\Facades\Auth;  // Importa o Facade Auth para autenticação de usuários
use Illuminate\Support\Facades\Hash;  // Importa o Facade Hash para verificação de senha
use Livewire\Component;  // Importa a classe Component do Livewire

class Login extends Component
{
    // Variáveis públicas que armazenam os dados do formulário
    public $email, $password, $role, $dominio;

    // Método chamado ao submeter o formulário de login
    public function login()
    {
        // Validação dos campos de entrada
        $this->validate([
            'email' => 'required|email',  // O email é obrigatório e deve ser um formato válido
            'password' => 'required|string|min:8',  // A senha é obrigatória e deve ter pelo menos 8 caracteres
            'dominio' => 'required|string|max:10',  // O domínio é obrigatório e deve ter no máximo 10 caracteres
        ]);

        // Verifica se o domínio existe
        $dominio = $this->dominio;  // Obtém o domínio fornecido pelo usuário
        $empresa = optional(empresas::where('dominio', $dominio)->first())->id;  // Verifica se o domínio existe no banco de dados
        if (!$empresa) {
            session()->flash('error', 'Erro: domínio inválido');  // Exibe uma mensagem de erro se o domínio não for encontrado
            return;
        }

        // Busca o usuário com o email fornecido
        $user = User::where('email', $this->email)->first();

        // Verifica se as credenciais estão corretas
        if ($user && Hash::check($this->password, $user->password)) {  // Verifica se a senha fornecida bate com a senha no banco
            // Loga o usuário no sistema
            Auth::login($user);

            // Redireciona o usuário com base no seu papel (role)
            switch ($user->role) {
                case 'gerente':
                    return redirect()->route('gerente-dashboard');  // Redireciona para o dashboard do gerente
                case 'funcionario':
                    return redirect()->route('funcionario-dashboard');  // Redireciona para o dashboard do funcionário
                case 'empresa':
                    return redirect()->route('empresa-dashboard');  // Redireciona para o dashboard da empresa
                default:
                    session()->flash('error', 'Credenciais inválidas.');  // Mensagem de erro se o papel do usuário não for reconhecido
                    return redirect()->route('login');
            }
        } else {
            // Exibe erro de credenciais inválidas
            session()->flash('error', 'Credenciais inválidas.');  // Mensagem de erro caso as credenciais estejam incorretas
        }
    }

    // Método responsável por renderizar a view de login
    public function render()
    {
        return view('livewire.pages.auth.login')->layout('layouts.auth-layout');  // Retorna a view de login com o layout correto
    }
}
