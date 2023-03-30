<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    public function cuantos_pares()
    {
        return $this->hasOne(CuantosPares::class);
    }
    
}
