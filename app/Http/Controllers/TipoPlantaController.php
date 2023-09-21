<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoPlanta;

class TipoPlantaController extends Controller
{
    public function store(Request $request)
    {
        $id_tipo = $request->input('id_tipo');
        $nuevo_tipo_planta = $request->input('nuevo_tipo_planta');
    
        // Comprobar si se proporcionó un nuevo tipo de planta
        if (!empty($nuevo_tipo_planta)) {
            $tipo = new TipoPlanta;
            $tipo->tipo_planta = $nuevo_tipo_planta;
            $tipo->save();
            $id_tipo = $tipo->id_tipo;
        }
    }
}