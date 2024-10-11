<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gerentes extends funcionarios
{
    use HasFactory;

    public function empresa()
    {
        return $this->belongsTo(empresas::class);
    }


    public function funcionarios()
    {
        return $this->hasMany(funcionarios::class);
    }


}
