<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ColetaResiduo extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function geradorResiduo(){
        return $this->belongsTo('\App\Models\GeradorResiduo');
    }

    public function catador(){
        return $this->belongsTo('\App\Models\Catador');
    }

    public function residuo(){
        return $this->belongsTo('\App\Models\Residuo');
    }

    public function status(){
        return $this->belongsTo('\App\Models\Status');
    }

    protected $fillable = ['gerador_residuo_id', 'catador_id', 'residuo_id', 'peso', 'status_id'];
}
