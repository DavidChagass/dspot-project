<?php

namespace App\Models;  // Define o namespace para o modelo Gerentes

use Illuminate\Database\Eloquent\Factories\HasFactory;  // Importa a trait HasFactory para a criação de fábricas de modelos
use Illuminate\Database\Eloquent\Model;  // Importa a classe base Model do Eloquent

class gerentes extends funcionarios  // O modelo Gerentes herda de Funcionarios, ou seja, é uma especialização do modelo Funcionarios
{
    use HasFactory;  // Utiliza a trait HasFactory para geração de fábricas de modelos

    // Relacionamento: Um gerente pertence a uma empresa
    public function empresa()
    {
        return $this->belongsTo(empresas::class);  // Define um relacionamento "pertence a" com o modelo Empresas
    }

    // Relacionamento: Um gerente pode ter muitos funcionários
    public function funcionarios()
    {
        return $this->hasMany(funcionarios::class);  // Define um relacionamento "tem muitos" com o modelo Funcionarios
    }
}
