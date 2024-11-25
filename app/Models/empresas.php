<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empresas extends Model
{

    use HasFactory;

    protected $fillable = [
        'user_id',
        'dominio',
        'telefone',
    ];


    public function user()
    {
        return $this->hasMany(User::class, 'empresa_id');
    }

    public function estoque()
    {
        return $this->hasOne(Estoque::class);
    }

    public function funcionarios()
    {
        return $this->hasMany(Funcionarios::class);
    }
    public function gerentes()
    {
        return $this->hasMany(Gerentes::class);
    }

}
