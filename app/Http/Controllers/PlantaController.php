<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planta;
use App\Models\RegistroRiego;
use App\Models\PlantaPersona;
use App\Models\TipoPlanta;
use Carbon\Carbon;


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

    public function store(Request $request)
    {
    $request->validate([
        'estado' => 'required',
        'nombre_planta' => 'required',
        'cantidad_agua' => 'required',
        'riego' => 'required|numeric|min:1',
    ]);

    $nombre_tipo = $request->input('nombre_tipo');
    $id_tipo = null;

    if (!$nombre_tipo) {
        $nuevo_nombre_tipo = $request->input('nuevo_nombre_tipo');

        if (!empty($nuevo_nombre_tipo)) {
            $nuevoTipo = TipoPlanta::create([
                'nombre_tipo' => $nuevo_nombre_tipo,
            ]);
            $id_tipo = $nuevoTipo->id_tipo;
        } else {
            // Manejo adicional si no se proporciona ni el nombre_tipo ni el nuevo_nombre_tipo
        }
    } else {
        $tipoExistente = TipoPlanta::where('nombre_tipo', $nombre_tipo)->first();
        $id_tipo = $tipoExistente->id_tipo;
    }

    $riegoEnDias = $request->riego;

    // Calcular la fecha de riego en función de los días ingresados
    $proxFechaRiego = Carbon::now()->addDays($riegoEnDias);

    // Crear el registro en la base de datos utilizando la fecha calculada
    Planta::create([
        'id_tipo' => $id_tipo,
        'estado' => $request->estado,
        'nombre_planta' => $request->nombre_planta,
        'cantidad_agua' => $request->cantidad_agua,
        'riego' => $proxFechaRiego, // Usar la fecha calculada
    ]);

    return redirect()->route('planta.index_planta');
   }  
    
   public function edit(Planta $planta)
   {
       $tipos = TipoPlanta::all();
       $estados = ['Seca','Sana','Floreciendo','Brotando','Con manchas','Pocha','Muerta'];
       return view('usuario.plantas.editar_planta', compact('planta', 'tipos', 'estados'));
   }
   
   public function update(Request $request, Planta $planta)
   {
       $request->validate([
           'nombre_planta' => 'required',
           'estado' => 'required',
           'cantidad_agua' => 'required',
           'riego' => 'required|numeric', 
       ]);

       $riegoEnDias = $request->riego;
       $fechaRiego = Carbon::now()->addDays($riegoEnDias);
   
       $planta->update([
           'nombre_planta' => $request->nombre_planta,
           'estado' => $request->estado,
           'cantidad_agua' => $request->cantidad_agua,
           'riego' => $fechaRiego,
       ]);
   
       return redirect()->route('planta.index_planta');
   }

    public function show(Planta $planta)
    {
    $fechaUltimoRiego = Carbon::parse($planta->riego); // Suponiendo que $planta->riego contiene una fecha
    $fechaActual = Carbon::now();
    $diasEntreRiegos = $fechaActual->diffInDays($fechaUltimoRiego);

    $nombre_tipo = TipoPlanta::find($planta->id_tipo)->nombre_tipo;

    return view('usuario.plantas.show_planta', compact('planta', 'nombre_tipo', 'diasEntreRiegos'));
    }

public function delete(Request $request, Planta $planta)
{
    $planta->delete();
    return redirect()->route('planta.index_planta');
}

};
