<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empresas extends Model
{
    use HasFactory;

    protected $fillable = [
      'dominio',
      'nome',
      'password',
      'email',
      'telefone'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function funcionarios(){
        return $this->hasMany(funcionarios::class);
    }

    public function gerentes(){
        return $this->hasMany(gerentes::class);
    }


    public function estoque(){
        return $this->hasMany(estoque::class);
    }
}
