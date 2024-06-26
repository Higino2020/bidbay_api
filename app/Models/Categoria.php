<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    public function produto(){
        return $this->hasMany(Produto::class);
    }
    public function subcategoria(){
        return $this->hasMany(SubCategoria::class);
    }
}
