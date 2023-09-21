<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planta;
use App\Models\RegistroRiego;
use App\Models\PlantaPersona;
use App\Models\TipoPlanta;


class PlantaController extends Controller
{
    public function index()
    {
        $plantas= Planta::all();
        return view('usuario.plantas.index_planta',  compact('plantas'));
    }

    public function create(){
        $tipos = TipoPlanta::all();
        $estados = ['Seca','Sana','Floreciendo','Brotando','Con manchas','Pocha','Muerta'];
        return view ('usuario.plantas.crear_planta', compact('tipos', 'estados'));
    }

    public function store(Request $request){
        $request->validate([
            'estado' => 'required',
            'nombre_planta' => 'required',
            'cantidad_agua' => 'required',
            'riego' => 'required',
        ]);
    
        $nombre_tipo = $request->input('nombre_tipo');
    
        if (!$nombre_tipo) {
            $nuevo_nombre_tipo = $request->input('nuevo_nombre_tipo');
    
            if (!empty($nuevo_nombre_tipo)) {
                $nuevoTipo = TipoPlanta::create([
                    'nombre_tipo' => $nuevo_nombre_tipo,
                ]);
                $id_tipo = $nuevoTipo->id_tipo;
            } else {
            }
        } else {
            $tipoExistente = TipoPlanta::where('nombre_tipo', $nombre_tipo)->first();
            $id_tipo = $tipoExistente->id_tipo;
        }
    
        Planta::create([
            'id_tipo'=> $id_tipo,
            'estado'=>$request->estado,
            'nombre_planta'=>$request->nombre_planta,
            'cantidad_agua'=>$request->cantidad_agua,
            'riego'=>$request->riego,
        ]);
        return redirect()->route('planta.index_planta');
    }
    public function edit(Planta $planta){
        return view('usuario.plantas.editar_planta', compact('planta'));
    }

    public function update(Request $request, Planta $planta){
        $planta->update([
            'nombre_planta' => $request->nombre_planta,
            'estado'=>$request->estado,
            'cantidad_agua'=>$request->cantidad_agua,
            'cantidad_agua'=>$request->cantidad_agua,
        ]);
        return redirect()->route('planta.index_planta');
    }

public function delete(Planta $planta){
    $planta->delete();
    return redirect()->route('planta.index_planta');
}

};
