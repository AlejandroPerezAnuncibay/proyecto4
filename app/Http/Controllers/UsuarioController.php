<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    //Funcion para enseñar la vista que contiene el formulario de registro
    public function showForm(){
        return view("usuarios.register");
    }
}
