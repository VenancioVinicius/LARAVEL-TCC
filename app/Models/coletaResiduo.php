<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColetaResiduo extends Model
{
    use HasFactory;

    public function geradorResiduo(){
        return $this->belongsTo('\App\Models\GeradorResiduo');
    }

    protected $fillable = ['gerador_residuo_id', 'residuo', 'peso'];
}
