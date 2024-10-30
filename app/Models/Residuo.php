<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residuo extends Model
{
    use HasFactory;

    public function coletaResiduo(){
        return $this->hasMany('\App\Models\ColetaResiduo');
    }
}
