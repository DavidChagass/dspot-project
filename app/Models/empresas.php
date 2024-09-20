<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empresas extends Model
{
    use HasFactory;

    public function funcionarios(){
        return $this->hasMany(funcionarios::class);
    }
}
