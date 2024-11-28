<?php

namespace App\Listeners;

use App\Events\ProductUpdated;
use App\Models\auditoria;

class AuditProductUpdate
{
    public function handle(ProductUpdated $event)
    {
        //insere uma nova linha na tabela auditoria
        auditoria::create([
            'tabela' => 'produtos',
            'acao' => 'UPDATE',
            'descricao' => 'produto: ' . $event->nomeProduto . ' teve os seguintes dados alterados: ' . $event->descricao,
            'user_id' => $event->user->id,
        ]);
    }
}
