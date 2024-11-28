<?php

namespace App\Models;  // Define o namespace para o modelo Empresas

use Illuminate\Database\Eloquent\Factories\HasFactory;  // Importa a trait HasFactory, usada para gerar fábricas de modelos
use Illuminate\Database\Eloquent\Model;  // Importa a classe Model, que é a classe base para todos os modelos Eloquent

class empresas extends Model
{
    use HasFactory;  // Utiliza a trait HasFactory, que permite gerar fábricas para este modelo

    protected $fillable = [
        'user_id',  // O ID do usuário associado à empresa
        'dominio',  // O domínio da empresa
        'telefone',  // O telefone da empresa
    ];

    // Relacionamento: Uma empresa pode ter muitos usuários associados a ela
    public function user()
    {
        return $this->hasMany(User::class, 'empresa_id');  // Define um relacionamento "hasMany" com o modelo User
    }

    // Relacionamento: Uma empresa tem um único estoque associado
    public function estoque()
    {
        return $this->hasOne(Estoque::class);  // Define um relacionamento "hasOne" com o modelo Estoque
    }

    // Relacionamento: Uma empresa pode ter muitos funcionários
    public function funcionarios()
    {
        return $this->hasMany(Funcionarios::class);  // Define um relacionamento "hasMany" com o modelo Funcionarios
    }

    // Relacionamento: Uma empresa pode ter muitos gerentes
    public function gerentes()
    {
        return $this->hasMany(Gerentes::class);  // Define um relacionamento "hasMany" com o modelo Gerentes
    }
}
