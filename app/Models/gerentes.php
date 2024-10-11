<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gerentes extends funcionarios
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'password',
    ];


}
