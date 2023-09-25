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
            'contraseña'=>$request->contraseña,
        ]);
        return redirect()->route('persona.index_persona');
    }

    public function edit(Persona $persona){
        return view('usuario.persona.editar_persona', compact ('persona'));
    }

    public function update(Request $request, Persona $persona)
    {
        $persona->update([
            'nombre_persona' => $request->nombre_persona,
            'apellidos' => $request->apellidos,
            'correo' => $request->correo,
            'contraseña' => $request->contraseña,
        ]);
        return redirect()->route('persona.index_persona');
    }

    public function show(Persona $persona)
    {
        return view('usuario.persona.show_persona', compact('persona'));
    }

    public function delete(Request $request, Persona $persona)
    {
        $persona->delete();
        return redirect()->route('persona.index_persona');
    }

}
