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



Route::get('/dashboard', 'ControladorIndex@mostrarHome')->middleware(['auth'])->name('dashboard');

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

//Estadisticas
Route::post("/estadisticas","ControladorIndex@cogerEstadisticas")->name("cogerEstadisticas");

//Proyectos
Route::post("/anadirColaborador", "ControladorProyectos@anadirColaboradorProyecto")->name("anadirColaborador");
Route::post("/anadirComentario", "ControladorProyectos@anadirComentarioProyecto")->name("anadirComentario");
Route::post("/anadirTarea", "ControladorProyectos@anadirTareaProyecto")->name("anadirTarea");
Route::get("/eliminarComentario/{id}","ControladorIndex@eliminarComentario")->name("eliminarComentario");
Route::get("/eliminarProyecto/{id}","ControladorIndex@eliminarProyecto")->name("eliminarProyecto");


Route::get("/actualizarTarea/{id}", "ControladorProyectos@actualizarTarea")->name("actualizarTarea");



//Ajustes
Route::post("/modificarDatos", "ControladorIndex@modificarDatosUsuario")->name("modificarDatosUsuario");
Route::post("/cambiarContrasena", "ControladorIndex@cambiarContrasena")->name('cambiarContrasena');

