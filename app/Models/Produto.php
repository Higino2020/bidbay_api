<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
    public function subcategoria(){
        return $this->belongsTo(SubCategoria::class);
    }
    public function vendedor(){
        return $this->belongsTo(Vendedor::class);
    }
    public function imagem(){
        return $this->belongsTo(Imagem::class);
    }
    public function leilao(){
        return $this->belongsTo(Leilao::class);
    }
    public function licitar(){
        return $this->belongsTo(Licitar::class);
    }
    public function compra(){
        return $this->belongsTo(Compra::class);
    }
}
