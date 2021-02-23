<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class ControladorLogin extends Controller
{
    public function registro(){
        request()->validate([
            "nombre" => "required|regex:/^[A-zÀ-ÿ]+([ ]+[A-zÀ-ÿ]+)*$/i",
            "apellido" => "required|regex:/^([A-ZÀ-ÿ]{2,}\s?)+$/i",
            "contrasena" => "required|regex:/^(?=.\d)(?=.[a-z])(?=.[A-Z])(?=.[a-zA-Z]).{8,}$/",
            "email" => "required",
            "fecha_nac" => "required"
        ],[
            "nombre.required" => "El nombre no ha sido introducido",
            "nombre.regex" => "El nombre introducido no es válido",
            "apellido.required" => "El apellido no ha sido introducido",
            "apellido.regex" => "El apellido introducido no es válido",
            "contrasena.required" => "La contraseña no ha sido introducida",
            "contrasena.regex" => "La contraseña introducida no es válida",
            "email.required" => "El email no ha sido introducido",
            "fecha_nac.required" => "La fecha de nacimiento no ha sido introducida"
        ]);

        $contrasenaEncriptada = password_hash(request("contrasena"), PASSWORD_DEFAULT);

        $usuario = Usuario::create([
            "nombre" => request("nombre"),
            "apellido" => request("apellido"),
            "contrasena" => $contrasenaEncriptada,
            "email" => request("email"),
            "fecha_nac" => request("fecha_nac")
        ]);



    }
    public function inicioSesion(){

    }
}
