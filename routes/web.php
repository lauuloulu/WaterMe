<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\PlantaController;
use App\Http\Controllers\PlantaPersonaController;
use App\Http\Controllers\RegistroRiegoController;
use App\Http\Controllers\TipoPlantaController;


Route::get('/', function () {
    return view('usuario.index');
})->name('usuario.index');

/*Route::get('usuario/index', function () {
    return view('usuario.index');
});*/

//Persona//

Route::get('/persona', [PersonaController::class, 'index'])->name('persona.index_persona');
Route::get('/persona/crear', [PersonaController::class, 'create'])->name('persona.crear');
Route::post('/persona/store', [PersonaController::class, 'store'])->name('persona.store');
Route::get('/persona/edit/{persona}',[PersonaController::class, 'edit'])->name('persona.edit');
Route::delete('/persona/delete/{persona}',[PersonaController::class,'delete'])->name('persona.delete');

//Planta//

Route::get('/planta', [PlantaController::class, 'index'])->name('planta.index_planta');
Route::get('/planta/crear', [PlantaController::class, 'create'])->name('planta.crear');
Route::post('/planta/store',[PlantaController::class, 'store'])->name('planta.store');
Route::get('planta/edit/{planta}', [PlantaController::class, 'edit'])->name('planta.edit');
Route::delete('planta/delete/{planta}', [PlantaController::class, 'delete'])->name('planta.delete');