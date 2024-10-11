<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estoque extends Model
{
        use HasFactory;
        protected $fillable =['empresa_id'];

public function empresa()
{
    return $this->belongsTo(Empresas::class);
}

public function produtos(){
    return $this->hasMany(Produtos::class);
}

}
