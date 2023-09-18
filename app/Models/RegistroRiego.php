<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroRiego extends Model
{
    //use HasFactory;

    protected $table= "registro_riego";

    protected $primaryKey= "id_registro";

    protected $fillable= [
        "id_registro",
        "id_pp",
        "fecha_registro",
        "nota_registro"
    ];

    public function planta_persona(): BelongsTo
    {
        return $this->belongsTo(PlantaPersona::class,"id_pp");
    }
};
