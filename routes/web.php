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
