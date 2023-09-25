<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\PlantaController;
use App\Http\Controllers\PlantaPersonaController;
use App\Http\Controllers\RegistroRiegoController;
use App\Http\Controllers\TipoPlantaController;
use App\Models\RegistroRiego;


Route::get('/', function () {
    $registros = RegistroRiego::all();

    return view('usuario.index', compact('registros'));
})->name('usuario.index');



//Persona//

Route::get('/persona', [PersonaController::class, 'index'])->name('persona.index_persona');
Route::get('/persona/crear', [PersonaController::class, 'create'])->name('persona.crear');
Route::post('/persona/store', [PersonaController::class, 'store'])->name('persona.store');
Route::get('/persona/edit/{persona}',[PersonaController::class, 'edit'])->name('persona.edit');
Route::delete('/persona/delete/{persona}',[PersonaController::class,'delete'])->name('persona.delete');
Route::put('/persona/update/{persona}', [PersonaController::class, 'update'])->name('persona.update');
Route::get('/persona/show/{persona}', [PersonaController::class, 'show'])->name('persona.show');


//Planta//

Route::get('/planta', [PlantaController::class, 'index'])->name('planta.index_planta');
Route::get('/planta/crear', [PlantaController::class, 'create'])->name('planta.crear');
Route::post('/planta/store',[PlantaController::class, 'store'])->name('planta.store');
Route::get('planta/edit/{planta}', [PlantaController::class, 'edit'])->name('planta.edit');
Route::delete('planta/delete/{planta}', [PlantaController::class, 'delete'])->name('planta.delete');
Route::put('/planta/update/{planta}', [PlantaController::class, 'update'])->name('planta.update');
Route::get('/planta/show/{planta}', [PlantaController::class, 'show'])->name('planta.show');

//Registro//

Route::get('/registro', [RegistroRiegoController::class, 'index'])->name('registro.index_registro');
Route::get('/registro/crear', [RegistroRiegoController::class, 'create'])->name('registro.crear');
Route::post('/registro/store',[RegistroRiegoController::class, 'store'])->name('registro.store');
Route::get('registro/edit/{registro}', [RegistroRiegoController::class, 'edit'])->name('registro.edit');
Route::delete('registro/delete/{registro}', [RegistroRiegoController::class, 'delete'])->name('registro.delete');
Route::put('/registro/update/{registro}', [RegistroRiegoController::class, 'update'])->name('registro.update');
Route::get('/registro/show/{registro}', [RegistroRiegoController::class, 'show'])->name('registro.show');

