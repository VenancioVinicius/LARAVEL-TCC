<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColetaResiduo extends Model
{
    use HasFactory;

    protected $fillable = ['geradorResiduo_id', 'residuo', 'peso'];
}
