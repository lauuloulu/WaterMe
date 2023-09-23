<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public $timestamps = false;

public function planta(): BelongsTo
{
    return $this->belongsTo(Planta::class, "id_planta");
}
public function persona(): BelongsTo
{
    return $this->belongsTo(Persona::class, "id_persona");
}
};
