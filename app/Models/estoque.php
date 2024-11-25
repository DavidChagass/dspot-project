<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estoque extends Model
{
    use HasFactory;
    protected $fillable =['nome','empresa_id'];
    protected $table = 'estoque';

public function empresa()
{
    return $this->belongsTo(Empresas::class);
}

public function getForeignKey()
{
    return 'empresa_id';
}

/* public function produtos(){
    return $this->hasMany(Produtos::class);
} */

public function produtos()
{
    return $this->hasMany(produtos::class, 'estoque_id', 'id');
}

}
