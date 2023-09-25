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
        'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
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
        }
    } else {
        $tipoExistente = TipoPlanta::where('nombre_tipo', $nombre_tipo)->first();
        if ($tipoExistente) {
            $id_tipo = $tipoExistente->id_tipo;
        }
    }

    $riegoEnDias = $request->riego;

    $proxFechaRiego = Carbon::now()->addDays($riegoEnDias);

    $planta = Planta::create([
        'id_tipo' => $id_tipo,
        'estado' => $request->estado,
        'nombre_planta' => $request->nombre_planta,
        'cantidad_agua' => $request->cantidad_agua,
        'riego' => $proxFechaRiego,
    ]);

    if ($request->hasFile('imagen')) {
        $imagen = $request->file('imagen');
        $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
        $imagen->storeAs('public/plant_images', $nombreImagen); 
        $planta->imagen = 'plant_images/' . $nombreImagen;
        $planta->save();
    }

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
           'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
       ]);
   
       $riegoEnDias = $request->riego;
       $fechaRiego = Carbon::now()->addDays($riegoEnDias);
   
       if ($request->hasFile('imagen')) {
           $imagen = $request->file('imagen');
           $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
           $imagen->storeAs('public/plant_images', $nombreImagen);
           $planta->imagen = 'plant_images/' . $nombreImagen;
       }
   
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
      $fechaUltimoRiego = Carbon::parse($planta->riego);
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