@extends('layouts.app')
@section('title')
   Crear proyecto
@endsection
@section('content')
    <section class="profile-account-setting">
        <div class="container">
            <div class="account-tabs-setting">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="acc-leftbar">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-acc-tab" data-toggle="tab" href="#nav-acc" role="tab" aria-controls="nav-acc" aria-selected="true"><i class="la la-plus-square"></i>Crear proyecto</a>

                            </div>
                        </div><!--acc-leftbar end-->
                    </div>
                    <div class="col-lg-9">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-acc" role="tabpanel" aria-labelledby="nav-acc-tab">
                                <div class="acc-setting">
                                    <h3>Crear proyecto</h3>
                                    <form action="{{route('crearProyecto')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="cp-field">
                                            <h5>Nombre de proyecto</h5>
                                            <div class="cpp-fiel">
                                                <input type="text" name="nombre" placeholder="Nombre proyecto">
                                                <i class="la la-folder-open"></i>
                                            </div>
                                        </div>
                                        <div class="cp-field">
                                            <h5>Descripción</h5>
                                            <div class="cpp-fiel">
                                                <input type="text" name="descripcion" placeholder="Descripción">
                                                <i class="la la-font"></i>
                                            </div>
                                        </div>
                                        <input type="text" hidden  name="creador" value="{{ Auth::user()->id }}">
                                        <div class="save-stngs pd2">
                                            <ul>

                                                    <input type="file" hidden class="custom-file-input" id="customFile" name="imgProyecto" accept=".png, .jpg, .jpeg, .jzif">
                                                <li><button type="button" class="anadirImagenFormulario"><label class="w-100" for="customFile">Añadir imagen</label></button></li><br>
                                                <li><button type="submit">Guardar proyecto</button></li>
                                                <li> <a class="btnEnviar" href="{{route('dashboard')}}" id="volver"></a></li>

                                            </ul>
                                        </div>
                                    </form>
                                </div><!--acc-setting end-->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--account-tabs-setting end-->
        </div>
    </section>

@endsection
@section("scripts")
    <script src="{{asset("js/imagenes.js")}}"></script>
@endsection
