@extends('layouts.app')

@section('content')

    <main>
        <div class="main-section">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-5 col-xs-8">
                    <h2 class="tituloProyecto">Mis proyectos</h2>
                    <div class="bg-light">
                        @if(count($miProyectos) > 0)
                            @foreach($miProyectos as $proyecto)
                                <div class="card">
                                    <img src="" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title" >{{$proyecto->nombre}}</h5>
                                        <p class="card-text">{{$proyecto->descripcion}}</p>
                                        <a href="/proyecto/{{ $proyecto->id }}" class="btn btn-primary btnEnviar">Ver proyecto</a>
                                    </div>

                                </div>
                            @endforeach
                        @else
                            <div class="card">
                                <div class="card-body">
                                    No hay proyectos creados.
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-5 col-xs-8">
                    <h2 class="tituloProyecto">Proyectos compartidos</h2>
                    <div class="bg-light">
                        @if(count($proyectosCompartidos) > 0)
                            @foreach($proyectosCompartidos as $proyecCompartido)
                                <div class="card">
                                    <img src="" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$proyecCompartido->nombre}}</h5>
                                        <p>{{$proyecCompartido->descripcion}}</p>
                                        <a href="/proyecto/{{ $proyecCompartido->id }}" class="btn btn-primary btnEnviar">Ver proyecto</a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="card">
                                <div class="card-body">
                                    No hay proyectos compartidos.
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>



@endsection

