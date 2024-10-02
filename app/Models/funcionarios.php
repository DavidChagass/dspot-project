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
        'email',
        'telefone',
        'password'
    ];
    protected $hidden = [
        'password',
        'remember_token'
    ];
    //    protected $confirm = ['passwordconfirm'];

    public function empresas()
    {
        return $this->belongsTo(Empresas::class);
    }

}
