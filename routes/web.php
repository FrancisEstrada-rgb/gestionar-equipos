<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware('auth')->group(function () {

    
    Route::get('/equipos', [EquipoController::class, 'index'])->name('equipos.index');
    Route::get('/equipos/{id}', [EquipoController::class, 'show'])->name('equipos.show')->where('id', '[0-9]+');
    Route::get('/equipos/crear', [EquipoController::class, 'create'])->name('equipos.create');
    Route::post('/equipos', [EquipoController::class, 'store'])->name('equipos.store');
    Route::get('/equipos/{id}/editar', [EquipoController::class, 'edit'])->name('equipos.edit')->where('id', '[0-9]+');
    Route::put('/equipos/{id}', [EquipoController::class, 'update'])->name('equipos.update')->where('id', '[0-9]+');
    Route::delete('/equipos/{id}', [EquipoController::class, 'destroy'])->name('equipos.destroy')->where('id', '[0-9]+');

    
   
    Route::get('/equipos/{equipoId}/jugadores', [JugadorController::class, 'index'])->name('jugadores.index');
    Route::get('/equipos/{equipoId}/jugadores/crear', [JugadorController::class, 'create'])->name('jugadores.create');
    Route::post('/equipos/{equipoId}/jugadores', [JugadorController::class, 'store'])->name('jugadores.store');
    Route::get('/equipos/{equipoId}/jugadores/{jugadorId}/editar', [JugadorController::class, 'edit'])->name('jugadores.edit');
    Route::put('/equipos/{equipoId}/jugadores/{jugadorId}', [JugadorController::class, 'update'])->name('jugadores.update');
    Route::delete('/equipos/{equipoId}/jugadores/{jugadorId}', [JugadorController::class, 'destroy'])->name('jugadores.destroy');



});
