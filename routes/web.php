<?php

use Illuminate\Support\Facades\Route;

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
Route::view("/","login.login");
Route::get("/", "controladorIndex@home")->name("home");
//Login
Route::post("/register","ControladorLogin@registro")->name("registrarse");
Route::post("/iniciosesion","ControladorLogin@inicioSesion")->name("iniciarSesion");

//Index
Route::get("/proyecto/{id}","ControladorIndex@mostrarProyecto")->name("mostrarProyecto");
Route::get("/ajustes","ControladorIndex@mostrarAjustes")->name("mostrarAjustes");
Route::get("/estadisticas","ControladorIndex@mostrarEstadisticas")->name("mostrarEstadisticas");
Route::get("/crearproyecto","ControladorIndex@crearProyecto")->name("crearProyecto");
Route::get("/cerrarSesion","ControladorIndex@cerrarSesion")->name("cerrarSesion");
