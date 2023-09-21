<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{
    public function index()
    {
        $persona = Persona::all();
        return view('usuario.persona.index_persona', compact ('persona'));
    }

    public function create()
    {
        return view('usuario.persona.crear_persona');
    }

    public function store(Request $request){
        Persona::create([
            'nombre_persona'=>$request->nombre_persona,
            'apellidos'=>$request->apellidos,
            'correo'=>$request->correo,
        ]);
        return redirect()->route('usuario.index');
    }

}
