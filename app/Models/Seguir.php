<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguir extends Model
{
    use HasFactory;
    public function
    public function user(){
        return $this->hasMany(User::class);
    }
}
