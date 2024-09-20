<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class funcionarios extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'empresa_id',
        'nome',
        'password',
        'email',
        'telefone',
    ];
    protected $hidden = ['password', 'remember_token'];


    public function empresas()
    {
        return $this->belongsTo(Empresas::class);
    }

}
