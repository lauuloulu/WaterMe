<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPlanta extends Model
{
    //use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_tipo'; 
    protected $table = "tipo_planta";
    protected $fillable= [
        "id_tipo",
        "nombre_tipo"
    ];

}
