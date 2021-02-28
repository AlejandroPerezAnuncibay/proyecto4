@extends('layouts.app')

@section('title')
    Estadisticas
@endsection
@section('content')
    <div class="main-section" style="margin-top: 15px;">
        <div class="row d-flex justify-content-center">
            <div class="col-xs-12">
                <form method="post" action="{{route("cogerEstadisticas")}}">
                    @csrf
                    <div class="form-group">
        <select id="selectUsu" class="form-control" name="usuarioEstadisticas">
    <option selected>Selecciona un usuario</option>
            @foreach($usuarios as $usuario)
                <option value="{{$usuario->id}}">{{ucfirst($usuario->name)}} {{ucfirst($usuario->surname)}}</option>
            @endforeach
</select>
<button type="button" id="sacarEstadisticas" onclick="mostrarDatos()" class="btn btnEnviar btn-primary" style="margin-top: 10px;">Mostrar estadisticas</button>





                    </div>
                </form>
                <div class="posts-section" id="graficos" style="display: none">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Proyectos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Mensajes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Tareas</a>
                    </li>

                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab"><div id="chart"></div></div>
                    <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab"><div id="chart2"></div></div>
                    <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab"><div id="chart3" ></div>
                </div>

                <script>

                </script>
             </div>
                </div>
         </div>
     </div>
    <script type="text/javascript" src="{{ asset('js/graficos.js') }}"
@endsection
