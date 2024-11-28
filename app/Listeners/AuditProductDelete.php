<?php

namespace App\Listeners;

use App\Events\ProductDeleted;
use App\Models\auditoria;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AuditProductDelete
{
    public function handle(ProductDeleted $event)
    {
        $descricao = [];
        foreach ($event->product->getAttributes() as $atributo => $valor) {
            $descricao[] = $atributo . ' = ' . $valor;
        }

        // Inserir uma nova linha na tabela de auditoria
        auditoria::create([
            'tabela' => 'produtos',
            'acao' => 'DELETE',
            'user_id' => $event->user->id,
            'descricao' => implode(', ', $descricao),
        ]);
    }
}


