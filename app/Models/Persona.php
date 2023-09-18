<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //use HasFactory;
protected $table= "persona";
protected $primaryKey= "id_persona";

protected $fillable= [
    "nombre_persona",
    "apellidos",
    "correo",
    "contraseña"
];

//protected $hidden= ["contraseña"]; 

}
