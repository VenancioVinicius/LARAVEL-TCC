<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    public function coletaResiduo(){
        return $this->hasMany('\App\Models\ColetaResiduo');
    }

    public function catador(){
        return $this->hasMany('\App\Models\Catador');
    }

    public function geradorResiduo(){
        return $this->hasMany('\App\Models\GeradorResiduo');
    }
}
