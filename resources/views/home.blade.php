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
                <div class="col-xl-5 col-xs-8">
                    <h2 class="tituloProyecto">Mis proyectos</h2>
                        @if(count($miProyectos) > 0)
                        <table id="dtBasicExample" class="table table-hover table-bordered table-sm" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="th-sm">Nombre

                                </th>
                                <th class="th-sm d-sm-block d-none">Descripcion

                                </th>
                                <th class="th-sm">Ver

                                </th>
                                <th class="th-sm">Eliminar

                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($miProyectos as $proyecto)
                              <tr>
                                  <td> <h5 class="card-title" >{{$proyecto->nombre}}</h5></td>
                                  <td class="d-sm-flex d-none"><p class="card-text">{{$proyecto->descripcion}}</p></td>
                                  <td>
                                      <a href="/proyecto/{{ $proyecto->id }}" class="btn btn-primary btnEnviar d-md-block d-none">Ver proyecto</a>
                                      <a href="/proyecto/{{ $proyecto->id }}" class="d-md-none d-xs-block"><i class="la la-eye"></i></a>
                                  </td>
                                  <td>
                                      <a href="/eliminarProyecto/{{$proyecto->id}}" class="btn btn-primary btnEnviar d-md-block d-none">Eliminar proyecto</a>
                                      <a href="/eliminarProyecto/{{$proyecto->id}}" class="d-md-none d-xs-block"><i class="la la-close"></i></a>
                                  </td>
                              </tr>
                            @endforeach
                            </tbody>
                        </table>

                    @else
                            <div class="card">
                                <div class="card-body">
                                    No hay proyectos creados.
                                </div>
                            </div>
                        @endif

                </div>

                <div class="col-xl-5 col-xs-8">
                    <h2 class="tituloProyecto">Proyectos compartidos</h2>
                        @if(count($proyectosCompartidos) > 0)
                            <table id="tabla2" class="table table-hover table-bordered table-sm" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th class="th-sm">Nombre

                                    </th>
                                    <th class="th-sm">Descripcion

                                    </th>
                                    <th class="th-sm">Ver

                                    </th>


                                </tr>
                                </thead>
                                <tbody>
                        @foreach($proyectosCompartidos as $proyecCompartido)

                                <tr>
                                    <td> <h5 class="card-title" >{{$proyecCompartido[0]->nombre}}</h5></td>
                                    <td><p class="card-text">{{$proyecCompartido[0]->descripcion}}</p></td>
                                    <td><a href="/proyecto/{{ $proyecCompartido[0]->id }}" class="btn btn-primary btnEnviar">Ver proyecto</a></td>
                                </tr>
                            @endforeach
                                </tbody>
                            </table>
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
    </main>



@endsection

