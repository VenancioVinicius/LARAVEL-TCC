<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeradorResiduo extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function coletaResiduo(){
        return $this->hasMany('\App\Models\ColetaResiduo');
    }

    public function status(){
        return $this->belongsTo('\App\Models\Status');
    }

    protected $fillable = ['nome', 'cep', 'telefone', 'status_id'];
}
