<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produtos extends estoque
{
    use HasFactory;

    protected $fillable = [
        'estoque_id',
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


    public function estoque()
    {
        return $this->belongsTo(Estoque::class);
    }



}
