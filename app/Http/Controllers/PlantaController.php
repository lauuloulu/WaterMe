<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planta;
use App\Models\RegistroRiego;
use App\Models\PlantaPersona;


class PlantaController extends Controller
{
    public function index()
    {
        Planta::all();
        return view('usuario.index');
    }

    

};
