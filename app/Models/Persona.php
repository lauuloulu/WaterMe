<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //use HasFactory;
public $timestamps = false;
protected $table= "persona";
protected $primaryKey= "id_persona";

protected $fillable= [
    "nombre_persona",
    "apellidos",
    "correo",
    "contraseña"
];

public function plantas()
{
    return $this->belongsToMany(Planta::class, 'planta_persona', 'id_persona', 'id_planta');
}

}
