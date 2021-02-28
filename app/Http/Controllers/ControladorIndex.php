<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use App\Models\Proyecto;
use App\Models\ProyectosUsuarios;
use App\Models\Tarea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\Environment;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use const http\Client\Curl\PROXY_HTTP;

use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\Hash;


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
        $comentarios=DB::table("mensajes")->select("*")->where("id_proyecto","=", $id)->orderBy('created_at','desc')->get();
        $tareas=DB::table("tareas")->select("*")->where("id_proyecto","=", $id)->orderBy('created_at','desc')->get();
        $fechaHoy=Carbon::now();
        $proyecto = Proyecto::find($id);
        $creador = User::find($proyecto->creador);

        if (count($arrayIds)>0 && count($comentarios)>0 && count($tareas)>0) {
            $arrayUsuarios = [];
            for ($x = 0; $x < count($arrayIds); $x++) {
                $usuario = DB::table('users')->select('*')->where('id', '=', $arrayIds[$x]->id_usuario)->get();

                array_push($arrayUsuarios, $usuario[0]);
            }

            return view('principales.proyecto')->with('proyecto', Proyecto::find($id))->with('colaboradores', $arrayUsuarios)->with('comentarios',$comentarios)->with('creador',$creador)->with("tareas",$tareas)->with("fecha",$fechaHoy->toDateString());

        }elseif (count($arrayIds)==0 && count($comentarios)>0 && count($tareas)>0) {
            $arrayUsuarios=[];
            return view('principales.proyecto')->with('proyecto', Proyecto::find($id))->with('colaboradores', $arrayUsuarios)->with('comentarios',$comentarios)->with('creador',$creador)->with("tareas",$tareas);

        }elseif(count($arrayIds)>0 && count($comentarios)==0 && count($tareas)>0){
            $arrayUsuarios = [];
            for ($x = 0; $x < count($arrayIds); $x++) {
                $usuario = DB::table('users')->select('*')->where('id', '=', $arrayIds[$x]->id_usuario)->get();

                array_push($arrayUsuarios, $usuario[0]);
            }

            $comentarios=[];
            return view('principales.proyecto')->with('proyecto', Proyecto::find($id))->with('colaboradores', $arrayUsuarios)->with('comentarios',$comentarios)->with('creador',$creador)->with("tareas", $tareas);

        }elseif(count($arrayIds)>0 && count($comentarios)>0 && count($tareas)==0){
            $arrayUsuarios = [];
            for ($x = 0; $x < count($arrayIds); $x++) {
                $usuario = DB::table('users')->select('*')->where('id', '=', $arrayIds[$x]->id_usuario)->get();

                array_push($arrayUsuarios, $usuario[0]);
            }

            $tareas=[];
            return view('principales.proyecto')->with('proyecto', Proyecto::find($id))->with('colaboradores', $arrayUsuarios)->with('comentarios',$comentarios)->with('creador',$creador)->with("tareas", $tareas);


        }
        elseif(count($arrayIds)==0 && count($comentarios)==0 && count($tareas)>0){
            $arrayUsuarios = [];
            $comentarios=[];
            return view('principales.proyecto')->with('proyecto', Proyecto::find($id))->with('colaboradores', $arrayUsuarios)->with('comentarios',$comentarios)->with('creador',$creador)->with("tareas", $tareas);

        }elseif(count($arrayIds)==0 && count($comentarios)>0 && count($tareas)==0){
            $arrayUsuarios = [];
            $tareas=[];
            return view('principales.proyecto')->with('proyecto', Proyecto::find($id))->with('colaboradores', $arrayUsuarios)->with('comentarios',$comentarios)->with('creador',$creador)->with("tareas", $tareas);

        }elseif(count($arrayIds)>0 && count($comentarios)==0 && count($tareas)==0){
            $arrayUsuarios = [];
            for ($x = 0; $x < count($arrayIds); $x++) {
                $usuario = DB::table('users')->select('*')->where('id', '=', $arrayIds[$x]->id_usuario)->get();

                array_push($arrayUsuarios, $usuario[0]);
            }

            $tareas=[];
            $comentarios=[];
            return view('principales.proyecto')->with('proyecto', Proyecto::find($id))->with('colaboradores', $arrayUsuarios)->with('comentarios',$comentarios)->with('creador',$creador)->with("tareas", $tareas);


        }
        else{
            $arrayUsuarios = [];
            $comentarios=[];
            $tareas=[];
            return view('principales.proyecto')->with('proyecto', Proyecto::find($id))->with('colaboradores', $arrayUsuarios)->with('comentarios',$comentarios)->with('creador',$creador)->with("tareas",$tareas);
        }

    }

    public function eliminarProyecto($id){
        $usuarioLogueado = Auth::user()->id;
        $proyecto = Proyecto::find($id);

        if ($usuarioLogueado == $proyecto->creador){
            Proyecto::destroy($id);
            return back();
        }else{

            return back('error', "No puedes eliminar el proyecto si no eres el creador");
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
    public function eliminarComentario($id){
        Mensaje::destroy($id);
        return back();
    }

    public function mostrarEstadisticas(){
        $usuarios = User::get();
        return view('principales.estadisticas')->with('usuarios',$usuarios);
    }


    public function mostrarAjustes(){
        $usuario = DB::table('Users')->select('*')->where('id', '=', Auth::user()->id)->get();
        return view("cuenta.ajustes");
    }

    public function modificarDatosUsuario(){

        \request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required'
        ]);

        $usuario = User::find(\request('idUsuario'));

        $usuario->name = \request('name');
        $usuario->surname = \request('surname');
        $usuario->email = \request('email');

        $usuario->save();
        return view("cuenta.ajustes")->with('misDatos', $usuario)->with('error', 'El usuario ha sido modificado');
    }

    public function cambiarContrasena(){
        \request()->validate([
            'old-password' => 'required',
            'new-password' => 'required',
            'repeat-password' => 'required'
        ]);

        $usuario = User::find(\request('authId'));

        if (password_verify(\request('old-password'),$usuario->password)){

            if (\request('new-password') == \request('repeat-password')){
                $usuario->password = password_hash(\request('new-password'), PASSWORD_DEFAULT);
                $usuario->save();
                return view("cuenta.ajustes")->with('misDatos', $usuario)->with('error', 'La contraseña ha sido modificada');
            }else{

                return view("cuenta.ajustes")->with('misDatos', $usuario)->with('error', 'Deben coincidir las contraseñas');
            }
        }else{
            die("no va");
            return view("cuenta.ajustes")->with('misDatos', $usuario)->with('error', 'La contraseña introducida no exite');
        }
    }

     public function cogerDatosEstadisticas($id)
    {
        $datos = [];
        $mensajes=[];
        $proyectos=[];
        $tareas=[];
        for ($x = 1; $x<=12; $x++){
            $contador = Mensaje::whereYear('created_at','=','2021')->whereMonth('created_at','=',$x)->where('creador','=',$id)->get();
            array_push($mensajes,count($contador));
        }
        for ($x = 1; $x<=12; $x++){
            $contador = Proyecto::whereYear('created_at','=','2021')->whereMonth('created_at','=',$x)->where('creador','=',$id)->get();
            array_push($proyectos,count($contador));
        }
        for ($x = 1; $x<=12; $x++){
            $contador = Tarea::whereYear('created_at','=','2021')->whereMonth('created_at','=',$x)->where('usuario_asignado','=',$id)->get();
            array_push($tareas,count($contador));
        }
        array_push($datos,$mensajes,$proyectos,$tareas);
       return $datos;
    }
}
