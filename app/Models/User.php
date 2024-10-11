<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $fillable = [
        'nome',
        'email',
        'password',
        'role',
        'empresa_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


public function isFuncionario(){
    return $this->role == 'funcionario';
}

public function isGerente(){
    return $this->role == 'gerente';
}



    public function empresa()
    {
        return $this->belongsTo(empresas::class);
    }




}
