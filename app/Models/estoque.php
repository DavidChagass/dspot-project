<?php

namespace App\Models;  // Define o namespace para o modelo Estoque

use Illuminate\Database\Eloquent\Factories\HasFactory;  // Importa a trait HasFactory para a criação de fábricas
use Illuminate\Database\Eloquent\Model;  // Importa a classe base Model do Eloquent

class estoque extends Model
{
    use HasFactory;  // Utiliza a trait HasFactory para geração de fábricas de modelos

    protected $fillable = ['nome', 'empresa_id'];  // Define os campos que podem ser atribuídos em massa (nome e empresa_id)
    
    protected $table = 'estoque';  // Especifica explicitamente o nome da tabela associada ao modelo (caso não seja o plural do nome do modelo)

    // Relacionamento: Um estoque pertence a uma empresa
    public function empresa()
    {
        return $this->belongsTo(Empresas::class);  // Define um relacionamento de "pertence a" com o modelo Empresas
    }

    // Retorna o nome da chave estrangeira usada para o relacionamento
    public function getForeignKey()
    {
        return 'empresa_id';  // Especifica explicitamente o nome da chave estrangeira associada ao estoque
    }

    // Relacionamento: Um estoque pode ter muitos produtos
    public function produtos()
    {
        return $this->hasMany(produtos::class, 'estoque_id', 'id');  // Define um relacionamento de "um para muitos" com o modelo Produtos
    }
}
