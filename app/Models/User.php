<?php

namespace App\Models;  // Define o namespace para o modelo User

use Illuminate\Database\Eloquent\Factories\HasFactory;  // Importa a trait HasFactory para a criação de fábricas de modelos
use Illuminate\Foundation\Auth\User as Authenticatable;  // Importa a classe base para usuários autenticados do Laravel
use Illuminate\Notifications\Notifiable;  // Importa a trait Notifiable para o envio de notificações

class User extends Authenticatable  // Define a classe User, que representa um usuário do sistema
{
    use HasFactory, Notifiable;  // Utiliza as traits HasFactory e Notifiable

    // Define os campos que podem ser preenchidos em massa
    protected $fillable = [
        'nome',        // Nome do usuário
        'email',       // Email do usuário
        'password',    // Senha do usuário
        'role',        // Papel do usuário (e.g., 'funcionario', 'gerente')
        'empresa_id'   // ID da empresa associada ao usuário
    ];

    // Define os campos que devem ser ocultados (não visíveis)
    protected $hidden = [
        'password',     // Senha do usuário (não será retornada nas respostas)
        'remember_token',  // Token de lembrança utilizado para sessões persistentes
    ];

    // Define os casts para tipos de dados
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',  // Converte o campo email_verified_at para o tipo datetime
            'password' => 'hashed',  // Converte a senha para o tipo hashed para garantir que ela seja tratada como uma senha criptografada
        ];
    }

    // Verifica se o usuário é um funcionário
    public function isFuncionario()
    {
        return $this->role == 'funcionario';  // Retorna true se o papel do usuário for 'funcionario'
    }

    // Verifica se o usuário é um gerente
    public function isGerente()
    {
        return $this->role == 'gerente';  // Retorna true se o papel do usuário for 'gerente'
    }

    // Relacionamento: Um usuário pertence a uma empresa
    public function empresa()
    {
        return $this->belongsTo(empresas::class);  // Define o relacionamento "pertence a" com o modelo Empresas
    }
}
