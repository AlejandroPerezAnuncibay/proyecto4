@extends('layouts.app')

@section('content')

    <main>
        <div class="main-section">
            <div class="row">
                <div class="col-5">
                    <h2>Mis proyectos</h2>
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
                            <h4>No hay proyectos creados</h4>
                        @endif
                    </div>
                </div>
                <div class="col-5">
                    <h2>Proyectos compartidos</h2>
                    <div class="bg-light">
                        @if(count($proyectosCompartidos) > 0)
                            @foreach($proyectosCompartidos as $proyecCompartido)
                                <div class="card border rounded">
                                    <div class="card-header bg-primary">
                                        <a href="/proyecto/{{ $proyecCompartido->id }}">{{$proyecCompartido->nombre}}</a>
                                    </div>
                                    <div class="card-body">
                                        <p>{{$proyecCompartido->descripcion}}</p>
                                        <!-- imagen
                                        <img src"">-->
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h4>No hay proyectos compartidos</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>



@endsection

