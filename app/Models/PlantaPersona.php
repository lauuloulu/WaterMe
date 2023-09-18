<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantaPersona extends Model
{
    //use HasFactory;

    protected $table= "planta_persona";

    protected $primaryKey= "id_pp";

    protected $fillable=[
        "id_planta",
        "id_persona",
        "id_pp"
    ];

public function planta(): BelongTo
{
    return $this->belongsTo(Planta::class, "id_planta");
}
public function persona(): BelongTo
{
    return this->belongsTo(Persona::class, "id_persona");
}
};
