<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\ProyectosUsuarios;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use const http\Client\Curl\PROXY_HTTP;

class ControladorIndex extends Controller
{
    public function home(){
        return view("principales.index");
    }

    public function mostrarFormulario(){
        return view("principales.formularioProyecto");

    }

    public function crearProyecto(){
        \request()-> validate([
            "nombre" => "required",
            "descripcion" => "required"
        ],[
            "nombre.required" => "El nombre no ha sido introducido",
            "descripcion" => "required"
        ]);

        Proyecto::create([
            "nombre" => \request("nombre"),
            "descripcion" => \request("descripcion"),
            "creador" => \request("creador")
        ]);

        return redirect("/dashboard");
    }

    public function mostrarProyecto($id){
        $arrayIds = DB::table('proyectosusuarios')->select('*')->where('id_proyecto','=',$id)->get();

        if (count($arrayIds)>0) {
            $arrayUsuarios = [];

            for ($x = 0; $x < count($arrayIds); $x++) {
                $usuario = DB::table('users')->select('*')->where('id', '=', $arrayIds[$x]->id_usuario)->get();

                array_push($arrayUsuarios, $usuario[0]);
            }
            return view('principales.proyecto')->with('proyecto', Proyecto::find($id))->with('colaboradores', $arrayUsuarios);
        }else{
            $arrayUsuarios=[];
            return view('principales.proyecto')->with('proyecto', Proyecto::find($id))->with('colaboradores', $arrayUsuarios);

        }
    }

    public function mostrarHome(){

            $proyectos = DB::table('Proyectos')->select('*')->where('creador','=',Auth::user()->id)->get();
            $idsProyectos = DB::table('proyectosusuarios')->select('id_proyecto')->where('id_usuario','=',Auth::user()->id)->get();
            $proyectosCompartidos = [];

        for ($x=0;$x<count($idsProyectos);$x++){
                array_push($proyectosCompartidos,DB::table('proyectos')->select('*')->where('id','=',$idsProyectos[$x]->id_proyecto)->get());
            }
            return view('home')->with('miProyectos', $proyectos)->with('proyectosCompartidos',$proyectosCompartidos);

    }

}
