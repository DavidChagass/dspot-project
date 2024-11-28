<?php

namespace App\Listeners;

use App\Events\ProductCreated;
use App\Models\auditoria;

class AuditProductCreate
{
    public function handle(ProductCreated $event)
    {
        $descricao = [];
        foreach ($event->product->getAttributes() as $atributo => $valor) {
            $descricao[] = $atributo . ' = ' . $valor;
        }

        // Inserir uma nova linha na tabela de auditoria
        auditoria::create([
            'tabela' => 'produtos',
            'acao' => 'CREATE',
            'user_id' => $event->user->id,
            'descricao'  => implode(', ', $descricao)
        ]);
    }
}
