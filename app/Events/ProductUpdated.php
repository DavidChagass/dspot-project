<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;



class ProductUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $product, $user, $descricao, $nomeProduto;

    public function __construct($product, $user, $descricao, $nomeProduto)
    {
        $this->product = $product;
        $this->user = $user;
        $this->descricao = $descricao;
        $this->nomeProduto = $nomeProduto;
    }
}

