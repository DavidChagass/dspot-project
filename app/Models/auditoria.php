<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class auditoria extends Model
{
    //
    use HasFactory;
    protected $table = 'auditoria';

    protected $fillable = [
        'tabela',
        'acao',
        'descricao',
        'user_id',
        'created_at',
        'updated_at'
    ];

    public function user(){
    return $this->belongsTo(User::class);
    }

}
