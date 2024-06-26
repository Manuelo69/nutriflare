<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValorNutricional extends Model
{
    use HasFactory;
    protected $table = 'valores_nutricionales';
    public function plato()
    {
        return $this->belongsTo(Plato::class);
    }
}
