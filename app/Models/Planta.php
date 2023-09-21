<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planta extends Model
{
    //use HasFactory;

    public $timestamps = false;
    protected $table= "planta";
    protected $primaryKey= 'id_planta';

    protected $fillable= [
        "id_tipo",
        "estado",
        "nombre_planta",
        "cantidad_agua",
        "riego"
    ];

public function tipo_planta(): BelongsTo
{
    return $this->belongsTo(TipoPlanta::class, 'id_tipo');
}
}
