<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class funcionarios extends User
{
    use HasFactory;

    public function empresa(){
        return $this->belongsTo(Empresas::class);
    }


}
