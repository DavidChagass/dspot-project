<?php

namespace App\Livewire\Pages\Auth;
use App\Models\empresas;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash as Hash;

class EmpresaRegister extends Component
{
    public $dominio, $nome, $email, $telefone, $password, $password_confirmation;

    protected $rules = [
        'dominio' => 'required|string|max:10|unique:empresas',
        'nome' => 'required|string|max:250',
        'email' => 'required|email|max:250|unique:users',
        'telefone' => 'nullable|string|',
        'password' => 'required|string|min:8|confirmed',
        'password_confirmation' => 'required|string|min:8',
    ];

    // Método responsável pelo registro da empresa e do usuário
    public function register()
    {
        // Validação dos dados de entrada
        $this->validate();

        // Criação do usuário com o papel de 'empresa'
        $user = User::create([
            'nome' => $this->nome,
            'email' => $this->email,
            'password' => Hash::make($this->password), // Hash da senha
            'role' => 'empresa', // Definindo o papel do usuário
        ]);

        // Criação da empresa associada ao usuário
        $empresa = empresas::create([
            'user_id' => $user->id, // Relacionando a empresa ao usuário
            'dominio' => $this->dominio,
            'telefone' => $this->telefone ?? null, // Caso não haja telefone, ele será null
        ]);

        // Mensagem de sucesso após o registro
        session()->flash('message', 'Empresa registrada com sucesso!');
        
        // Resetando os campos do formulário
        $this->reset();

        // Redireciona para a página de login após o registro
        return redirect()->route('login'); // login.empresa
    }

    // Método render responsável por retornar a view do registro
    public function render()
    {
        return view('livewire.pages.empresas.empresa-register')->layout('layouts.auth-layout');
    }
}
