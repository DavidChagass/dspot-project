<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estoque extends Model
{
    use HasFactory;

    protected $fillable = [
        'empresa_id',
        'produto',
        'detalhes',
        'perecivel',
        'quantidadeAtual',
        'quantidadeTotal',
        'precoCompra',
        'precoVenda',
        'dataUltimaModificacao',
        'dataValidade',
        'fornecedor',
    ];

    public function empresas()
    {
        return $this->belongsTo(Empresas::class);
    }

}
