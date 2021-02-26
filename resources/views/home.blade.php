@extends('layouts.app')
@push('style')
    <style type="text/css">
        .my-active span{
            background-color: #5cb85c !important;
            color: white !important;
            border-color: #5cb85c !important;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endpush
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
                                        <a  href="/eliminarProyecto/{{$proyecto->id}}"><i class="la la-close"></i></a>
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
                            {{ $miProyectos->links('vendor.pagination.bootstrap-4') }}
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
                                        <h5 class="card-title">{{$proyecCompartido[0]->nombre}}</h5>
                                        <p>{{$proyecCompartido[0]->descripcion}}</p>
                                        <a href="/proyecto/{{ $proyecCompartido[0]->id }}" class="btn btn-primary btnEnviar">Ver proyecto</a>
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
    </main>



@endsection

