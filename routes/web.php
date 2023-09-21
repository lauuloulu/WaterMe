<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\PlantaController;
use App\Http\Controllers\PlantaPersonaController;
use App\Http\Controllers\RegistroRiegoController;
use App\Http\Controllers\TipoPlantaController;


Route::get('/', function () {
    return view('welcome');
});

/*Route::get('usuario/index', function () {
    return view('usuario.index');
});*/

Route::get('/', [PlantaController::class, 'index'])->name('planta.index');

//Persona//

Route::get('/persona', [PersonaController::class, 'index'])->name('persona.index_persona');
Route::get('/persona/crear', [PersonaController::class, 'create'])->name('persona.crear');
Route::post('/persona/store', [PersonaController::class, 'store'])->name('persona.store');

//Planta//

Route::get('/planta', [PlantaController::class, 'index'])->name('planta.index_planta');
Route::get('/planta/crear', [PlantaController::class, 'create'])->name('planta.crear');
Route::post('/planta/store',[PlantaController::class, 'store'])->name('planta.store');