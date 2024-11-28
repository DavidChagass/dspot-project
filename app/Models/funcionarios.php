<?php

namespace App\Models;  // Define o namespace para o modelo Funcionarios

use Illuminate\Database\Eloquent\Factories\HasFactory;  // Importa a trait HasFactory para a criação de fábricas de modelos
use Illuminate\Database\Eloquent\Model;  // Importa a classe base Model do Eloquent

class funcionarios extends User  // O modelo Funcionarios herda de User, indicando que é uma especialização do modelo User
{
    use HasFactory;  // Utiliza a trait HasFactory para geração de fábricas de modelos

    // Relacionamento: Um funcionário pertence a uma empresa
    public function empresa()
    {
        return $this->belongsTo(Empresas::class);  // Define um relacionamento "pertence a" com o modelo Empresas
    }
}
