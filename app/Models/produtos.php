<?php

namespace App\Models;  // Define o namespace para o modelo Produtos

use Illuminate\Database\Eloquent\Factories\HasFactory;  // Importa a trait HasFactory para a criação de fábricas de modelos
use Illuminate\Database\Eloquent\Model;  // Importa a classe base Model do Eloquent

class produtos extends Model  // Define a classe Produtos, que representa os produtos no estoque
{
    use HasFactory;  // Utiliza a trait HasFactory para a criação de fábricas de modelos

    // Definindo os campos que podem ser preenchidos em massa
    protected $fillable = [
        'estoque_id',   // ID do estoque ao qual o produto pertence
        'produto',      // Nome do produto
        'detalhes',     // Detalhes adicionais sobre o produto
        'perecivel',    // Indica se o produto é perecível (booleano)
        'quantidadeAtual',  // Quantidade atual do produto no estoque
        'quantidadeTotal',  // Quantidade total do produto no estoque
        'precoCompra',  // Preço de compra do produto
        'precoVenda',   // Preço de venda do produto
        'dataValidade', // Data de validade do produto
        'fornecedor',   // Fornecedor do produto
    ];

    // Relacionamento: O produto pertence a um estoque
    public function estoque()
    {
        return $this->belongsTo(estoque::class, 'estoque_id', 'id');  // Define um relacionamento "pertence a" com o modelo Estoque
    }
}
