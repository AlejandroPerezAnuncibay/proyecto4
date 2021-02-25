<?php

use Illuminate\Support\Facades\Route;
use App\Models\Proyecto;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/dashboard', function () {
    $proyectos = Proyecto::get()->where('id',Auth::user()->id);
    $proyectosCompartidos = Proyecto::get()->where('id',Auth::user()->id);
    return view('home')->with('miProyectos', $proyectos)->with('proyectosCompartidos',$proyectosCompartidos);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view("/","auth.login");

//Login
Route::post("/registrar","ControladorLogin@registro")->name("registrarse");
Route::post("/iniciosesion","ControladorLogin@inicioSesion")->name("iniciarSesion");

//Index
Route::get("/proyecto/{id}","ControladorIndex@mostrarProyecto")->name("mostrarProyecto");
Route::get("/ajustes","ControladorIndex@mostrarAjustes")->name("mostrarAjustes");
Route::get("/estadisticas","ControladorIndex@mostrarEstadisticas")->name("mostrarEstadisticas");
Route::post("/crearproyecto","ControladorIndex@crearProyecto")->name("crearProyecto");
Route::get("/proyectos","ControladorIndex@mostrarFormulario")->name("mostrarFormularioCrearProyectos");
Route::get("/cerrarSesion","ControladorIndex@cerrarSesion")->name("cerrarSesion");


//Proyectos
Route::post("/anadirColaborador", "ControladorProyectos@anadirColaboradorProyecto")->name("anadirColaborador");
