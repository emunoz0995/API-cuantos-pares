<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuantosPares extends Model
{
    use HasFactory;
    public function visitors()
    {
        return $this->belongsTo(Visitors::class);
    }
}
