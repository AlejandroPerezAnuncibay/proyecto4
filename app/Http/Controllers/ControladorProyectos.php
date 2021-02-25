<?php

namespace App\Http\Controllers;

use App\Models\ProyectosUsuarios;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControladorProyectos extends Controller
{
    public function anadirColaboradorProyecto(){
        request()->validate([
            "email" => "required"
        ],[
            "email.required" => "Debe introducir un email"
        ]);
        $idUsuario = DB::table('users')->select('*')->where('email','=',\request('email'))->get();
        if (count($idUsuario)>0){
            $idVerdadero = $idUsuario[0]->id;

            if(\request("email") ==\request('authUserEmail')){
                return back()->with("error","No te puedes añadir a ti mismo");

            }else{
                $contar = DB::table('proyectosusuarios')->select('*')->where('id_proyecto','=',\request('idProyecto'))->where('id_usuario','=',$idVerdadero)->get();
                if(count($contar)>0){
                    return back()->with("error","Esta persona ya está añadida");

                }else{
                    ProyectosUsuarios::create([
                        "id_proyecto" => \request("idProyecto"),
                        "id_usuario" => $idVerdadero
                    ]);
                    return back();
                }

            }

        }else{
            return redirect('/proyecto/'.\request('idProyecto'))->with("error","No existe el correo en la base de datos");
        }



    }
}
