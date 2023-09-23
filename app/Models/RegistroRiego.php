<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegistroRiego extends Model
{
    //use HasFactory;
    public $timestamps = false;

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
    
    public function planta()
{
    return $this->belongsTo(Planta::class, 'id_planta');
}

public function persona()
{
    return $this->belongsTo(Persona::class, 'id_persona');
}
};
