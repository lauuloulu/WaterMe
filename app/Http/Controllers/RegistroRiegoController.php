<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Planta;
use App\Models\RegistroRiego;
use App\Models\PlantaPersona;
use App\Models\TipoPlanta;
use App\Models\Persona;

class RegistroRiegoController extends Controller
{
    public function index()
    {
        $registros = RegistroRiego::with(['planta_persona.persona', 'planta_persona.planta'])
        ->orderBy('fecha_registro', 'desc')
        ->get();
        return view('usuario.registro.index_riego', compact('registros'));
    }

    public function create()
    {
        $personas = Persona::all();
        $plantas = Planta::all();
        return view('usuario.registro.crear_riego', compact('personas','plantas'));
    }

    public function store(Request $request) {
        $request->validate([
            'fecha_registro' => 'required|date',
            'id_planta' => 'required|numeric',
            'id_persona' => 'required|numeric',
            'nota_registro' => 'required|string',
        ]);
    
    $plantaPersona = PlantaPersona::firstOrNew([
        'id_planta' => $request->id_planta,
        'id_persona' => $request->id_persona,
    ]);

    $plantaPersona->save();

    RegistroRiego::create([
        'fecha_registro' => $request->fecha_registro,
        'nota_registro' => $request->nota_registro,
        'id_pp' => $plantaPersona->id_pp,
    ]);

    return redirect()->route('usuario.index');
}

    public function edit(RegistroRiego $registro){
        $personas = Persona::all();
        $plantas = Planta::all();
        return view('usuario.registro.editar_riego', compact ('registro', 'personas','plantas'));
    }

    public function update(Request $request, RegistroRiego $registro)
    {
        $registro->update([
            'fecha_registro'=>$request->fecha_registro,
            'nota_registro'=>$request->nota_registro,
        ]);
         $registro->planta_persona->update([
        'id_planta' => $request->id_planta,
        'id_persona' => $request->id_persona,
    ]);
        return redirect()->route('registro.index_registro');
    }

    public function show(RegistroRiego $registro)
    {
        return view('usuario.registro.show_riego', compact('registro'));
    }

    public function delete(Request $request, RegistroRiego $registro)
    {
        $registro->delete();
        return redirect()->route('registro.index_registro');
    }
}
