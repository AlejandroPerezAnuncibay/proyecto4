@extends("layouts.app")

@section("content")
@section('title')
    Proyecto {{$proyecto->nombre}}
@endsection

        <section class="cover-sec">

                <img src="/{{ $proyecto->imagen }}" alt="No hay imagen de proyecto" width="100%" height="250px">
        </section>
        <div class="modal fade" id="cambiarImagen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Elige una imagen para cambiar la portada</h3>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route("cambiarImagenProyecto") }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="sn-field">
                                <input type="file" name="imgProyecto" hidden id="cambiar">
                                <button type="button" class="btn btnEnviar btn-primary"><label for="cambiar">Elegir portada</label></button>
                                <input type="hidden" name="idProyecto" value="{{ $proyecto->id }}">
                            </div>
                            {!! $errors->first('email','<p style="color:red;">:message</p>') !!}
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btnEnviar btn-primary">Cambiar portada</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <main>
            <div class="main-section">
                <div class="container">
                    <div class="main-section-data">
                        <div class="row">

                                @if(\Session::has('error'))
                                <div class="errors col-12 mb-3">
                                    <small style="color: red">{{\Session::get('error')}}</small>
                                </div>
                                @endif

                            <div class="col-lg-3 mt-1 order-3 order-lg-1">


                            <div class="mt-5">



                                <div class="main-left-sidebar">
                                    <div class="user_profile">


                                        <div class="user_pro_status">



                                                <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Añadir colaborador al proyecto {{ $proyecto->nombre }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('anadirColaborador')}}" method="post">
                                                                        @csrf
                                                                        <div class="sn-field">
                                                                            <input id="e-mail" style="padding: 10px 15px 10px 40px;" type="email" placeholder="Email" class="form-control" required name="email" >
                                                                            <i class="la la-envelope-o"></i>
                                                                            <input type="text" name="idProyecto" hidden value="{{$proyecto->id}}">
                                                                            <input type="text" name="authUserEmail" hidden value="{{Auth::user()->email}}">
                                                                        </div>
                                                                        {!! $errors->first('email','<p style="color:red;">:message</p>') !!}
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                            <button type="submit" class="btn btnEnviar btn-primary">Añadir</button>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>



                                        </div><!--user_pro_status end-->
                                        <ul class="flw-status">
                                            <li>
                                                <span>Colaboradores</span>
                                                <b>{{ count($colaboradores) }}</b>
                                            </li>
                                        </ul>

                                    </div><!--user_profile end-->
                                    <div class="suggestions full-width">
                                        <div class="sd-title">
                                            <h3 style="text-align: center">Creador</h3>

                                        </div><!--sd-title end-->
                                        <div class="suggestions-list">
                                            <div class="suggestion-usd">
                                                <div class="sgt-text">
                                                    <h4>{{$creador->name}} {{$creador->surname}}</h4><small>(Creador)</small>
                                                    <span>{{$creador->email}}</span>
                                                </div>
                                            </div>
                                            <div class="sd-title" style="border-top: 1px solid #e5e5e5;">
                                                <h3 style="text-align: center;">Colaboradores</h3>

                                            </div>
                                            @if(count($colaboradores)>0)

                                                @foreach($colaboradores as $colaborador)
                                                    <div class="suggestion-usd">
                                                        <div class="sgt-text">
                                                            <h4>{{$colaborador->name}} {{$colaborador->surname}}</h4>
                                                            <span>{{$colaborador->email}}</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="suggestion-usd">
                                                    <div class="sgt-text">
                                                        <p>No hay colaboradores</p>
                                                    </div>
                                                </div>
                                            @endif


                                        </div><!--suggestions-list end-->
                                    </div><!--suggestions end-->
                                </div><!--main-left-sidebar end-->
                            </div>
                            </div>
                            <div class="col-lg-6 order-2">

                                <div class="main-ws-sec">
                                    <div class="user-tab-sec">
                                        <h3>{{$proyecto->nombre}}</h3>
                                        <div class="star-descp">
                                            <span>{{$proyecto->descripcion}}</span>

                                        </div><!--star-descp end-->
                                        <div class="tab-feed st2">
                                            <ul>
                                                <li data-tab="feed-dd" class="active">
                                                    <a href="#" title="">
                                                        <img src="{{ URL::asset('images/ic1.png') }}" alt="">
                                                        <span>Comentarios</span>
                                                    </a>
                                                </li>
                                                <li data-tab="info-dd">
                                                    <a href="#" title="">
                                                        <img src="{{ URL::asset('images/ic2.png') }}" alt="">
                                                        <span>Tareas</span>
                                                    </a>
                                                </li>

                                                <li data-tab="portfolio-dd">
                                                    <a href="#" title="">
                                                        <img src="{{ URL::asset('images/ic3.png') }}" alt="">
                                                        <span>Portfolio</span>
                                                    </a>
                                                </li>

                                            </ul>
                                        </div><!-- tab-feed end-->
                                    </div><!--user-tab-sec end-->
                                    <div class="product-feed-tab current" id="feed-dd">

                                        @if($errors->has("fechaVencimiento"))
                                            <div class="error">
                                                <small class="text-danger">{{$errors->first("fechaVencimiento")}}</small>
                                            </div>
                                        @endif
                                        <div class="posts-section">

                                            @if(count($comentarios)==0)
                                                <small>No existen comentarios para este proyecto</small>
                                            @else
                                                @foreach($comentarios as $comentario)
                                            <div class="post-bar">
                                                <div class="post_topbar">
                                                    <div class="usy-dt">
                                                        <div class="usy-name">
                                                            <h3>{{$comentario->nombreCreador}}</h3>
                                                            <span><img src="{{ URL::asset('images/clock.png') }}" alt="">  {{ \Carbon\Carbon::parse($comentario->created_at)->diffForHumans() }}</span>
                                                        </div>
                                                    </div>
                                                    @if($comentario->creador == Auth::user()->id)
                                                    <div class="ed-opts">
                                                        <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                        <ul class="ed-options">
                                                            <li><a href="/eliminarComentario/{{$comentario->id}}" title="">Eliminar comentario</a></li>
                                                        </ul>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="epi-sec">
                                                    <ul class="descp">
                                                        <li><span></span></li><!-- Sacra email de usuario -->
                                                    </ul>
                                                </div>
                                                <div class="job_descp">
                                                    <h3>{{$comentario->titulo}}</h3>
                                                    <p>{{ $comentario->descripcion }}</p>
                                                </div>

                                            </div>
                                                @endforeach
                                            @endif

                                        </div><!--posts-section end-->
                                    </div><!--product-feed-tab end-->
                                    <div class="modal fade" id="tareaModal" tabindex="-1" role="dialog" aria-labelledby="tareaModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="tareaModalLabel">Añadir tarea a {{ $proyecto->nombre }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('anadirTarea')}}" method="post">
                                                        @csrf
                                                        <div class="sn-field">
                                                            <input id="tituloTarea" style="padding: 10px 15px 10px 40px;" type="text" placeholder="Titulo" class="form-control" required name="titulo" >
                                                            <i class="la la-envelope-o"></i>

                                                            <input type="text" name="idProyecto" hidden value="{{$proyecto->id}}">
                                                            <input type="text" name="creador" hidden value="{{Auth::user()->id}}">
                                                        </div>
                                                        <label for="descripcionTarea" style="padding: 10px 0; color: grey">Descripción: </label><br>
                                                        <div class="sn-field border-0">
                                                            <textarea id="descripcionTarea" style="padding: 10px 15px  40px; min-height: 100px;max-height: 100px;" type="text"  class="form-control" required name="descripcion" ></textarea>

                                                        </div>
                                                        <label for="usuarioAsignado" style="margin: 10px 0; color: grey">Usuario Asignado:</label><br>

                                                        <div class="sn-field">

                                                            <select name="usuarioAsignado" style="padding: 6px 15px 10px 40px;" class="form-control" id="userAsignado">
                                                                <option value="{{$creador->id}}">{{$creador->email}}</option>
                                                                @foreach($colaboradores as $colaborador)
                                                                    <option value="{{$colaborador->id}}">{{$colaborador->email}}</option>
                                                                @endforeach
                                                            </select>
                                                            <i class="la la-caret-down"></i>
                                                        </div>
                                                        <label for="fechaVencimiento" style="margin: 10px 0; color: grey">Fecha de vencimiento:</label><br>

                                                        <div class="sn-field" id="fecha">
                                                            <input type="date" name="fechaVencimiento" class="form-control" id="fechaVencimiento" >

                                                        </div>

                                                        <div class="modal-footer border-0">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                            <button  type="submit" onclick="validarFecha()" class="btn btnEnviar btn-primary" id="anadirTarea">Añadir</button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-feed-tab" id="info-dd">

                                        <div class="tarea-btn">

                                            <ul class="flw-hr">
                                                <li><!-- Button trigger modal -->
                                                    <button type="button" class="btn btnEnviar btn-primary" data-toggle="modal" data-target="#tareaModal">
                                                        <i class="la la-file-text"></i> Añadir tarea
                                                    </button>
                                                    @if(isset($errorTarea))
                                                        <small style="color: red">{{ $errorTarea }}</small>
                                                @endif
                                                <!-- Modal -->

                                                </li>
                                            </ul>
                                        </div>

                                    @if(count($tareas)>0)

                                        <table class="table">
                                            <tbody>
                                                @foreach($tareas as $tarea)
                                                    @if($tarea->realizado==0 && $tarea->fecha_vencimiento>= now()->toDateString())
                                                        <tr class="borrarTarea{{$tarea->id}}">
                                                            <td>
                                                                <div class="user-profile-ov ">
                                                                    <div class=" tarea{{$tarea->id}} alert alert-warning px-4 py-3 ">
                                                                        <div class="row">
                                                                            <h3 class=" col-12 col-md-5"><a href="#" title="" class="overview-open">{{$tarea->titulo}}</a> <a href="#" title="" class="overview-open"></a></h3>
                                                                            <p class="col-12 col-md-7">Fecha de vencimiento: {{$tarea->fecha_vencimiento}}</p>
                                                                        </div>
                                                                        @if($tarea->usuario_asignado== $creador->id)
                                                                            <small>{{$creador->email}}</small>

                                                                        @else
                                                                            @foreach($colaboradores as $colaborador)
                                                                                @if($colaborador->id== $tarea->usuario_asignado)
                                                                                    <small>{{$colaborador->email}}</small>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                        <p>{{$tarea->descripcion}}</p>
                                                                        <div class="d-flex justify-content-between">

                                                                            <button onclick="actualizarTarea({{$tarea->id}})" class=" btn{{$tarea->id}} btn btnEnviar">Acabar Tarea</button>
                                                                            <button onclick="borrarTarea({{$tarea->id}})" class=" btn{{$tarea->id}} btn btnBorrar ">Eliminar Tarea</button>

                                                                        </div><!--user-profile-ov end-->
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @elseif($tarea->realizado==0 && $tarea->fecha_vencimiento <= now()->toDateString())
                                                        <tr>
                                                            <td>
                                                                <div class="user-profile-ov ">
                                                                    <div class=" alert alert-danger px-4 py-3 ">
                                                                        <div class="row">
                                                                            <h3 class=" col-12 col-md-5"><a href="#" title="" class="overview-open">{{$tarea->titulo}}</a> <a href="#" title="" class="overview-open"><i class="fa fa-pencil"></i></a></h3>
                                                                            <p class="col-12 col-md-7">Fecha de vencimiento: {{$tarea->fecha_vencimiento}}</p>
                                                                        </div>
                                                                        @if($tarea->usuario_asignado== $creador->id)
                                                                            <small>{{$creador->email}}</small>

                                                                        @else
                                                                            @foreach($colaboradores as $colaborador)
                                                                                @if($colaborador->id== $tarea->usuario_asignado)
                                                                                    <small>{{$colaborador->email}}</small>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                        <p>{{$tarea->descripcion}}</p>


                                                                    </div><!--user-profile-ov end-->
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @elseif($tarea->realizado==1)
                                                        <tr>
                                                            <td>
                                                                <div class="user-profile-ov ">
                                                                    <div class=" alert alert-success px-4 py-3 ">
                                                                        <div class="row">
                                                                            <h3 class=" col-12 col-md-5"><a href="#" title="" class="overview-open">{{$tarea->titulo}}</a> <a href="#" title="" class="overview-open"><i class="fa fa-pencil"></i></a></h3>
                                                                            <p class="col-12 col-md-7">Fecha de vencimiento: {{$tarea->fecha_vencimiento}}</p>
                                                                        </div>
                                                                        @if($tarea->usuario_asignado== $creador->id)
                                                                            <small>{{$creador->email}}</small>

                                                                        @else
                                                                        @foreach($colaboradores as $colaborador)
                                                                            @if($colaborador->id== $tarea->usuario_asignado)
                                                                        <small>{{$colaborador->email}}</small>
                                                                            @endif
                                                                        @endforeach
                                                                        @endif
                                                                        <p>{{$tarea->descripcion}}</p>

                                                                    </div><!--user-profile-ov end-->
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif

                                                @endforeach
                                            </tbody>

                                        </table>


                                        @else

                                                <small>No hay tareas añadidas.</small>

                                        @endif

                                    </div><!--product-feed-tab end-->


                                    <div class="product-feed-tab" id="portfolio-dd">
                                        <div class="portfolio-gallery-sec">
                                            <h3>Archivos</h3>
                                            <div class="gallery_pf">
                                                <div class="row">
                                                    @if(count($archivos) > 0)
                                                        @foreach($archivos as $archivo)
                                                            <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                                <div class="gallery_pt">
                                                                    @if($archivo->extension == "jpg"||$archivo->extension == "jpeg"||$archivo->extension == "png"||$archivo->extension == "jfif")
                                                                    <img src="/{{ $archivo->urlImagen }}" alt="">
                                                                    <a href="/{{$archivo->urlImagen}}"  download title=""><img src="/{{ $archivo->urlImagen }}" alt=""></a>
                                                                    @else
                                                                        <img src="{{ url('img/pdf.png') }}">
                                                                        <a href="/{{$archivo->urlImagen}}"  download title=""><img src="/{{ $archivo->urlImagen }}" alt=""></a>
                                                                    @endif
                                                                </div><!--gallery_pt end-->
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <small>No hay archivos añadidos</small>
                                                   @endif
                                                </div>
                                            </div><!--gallery_pf end-->
                                        </div><!--portfolio-gallery-sec end-->
                                    </div><!--product-feed-tab end-->

                                </div><!--main-ws-sec end-->
                            </div>
                            <div class="col-lg-3 p-0 order-1 order-lg-3">
                                <div class="right-sidebar w-100">
                                    <div class="message-btn">

                                        <ul class="flw-hr">
                                            <li><!-- Button trigger modal -->

                                                @if(isset($errorComentario))
                                                    <small style="color: red">{{ $errorComentario }}</small>
                                            @endif
                                            <!-- Modal -->
                                                <div class="modal fade" id="comentarioModal" tabindex="-1" role="dialog" aria-labelledby="comentarioModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="comentarioModalLabel">Añadir comentario a {{ $proyecto->nombre }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{route('anadirComentario')}}" method="post">
                                                                    @csrf
                                                                    <div class="sn-field">
                                                                        <input id="titulo" style="padding: 10px 15px 10px 40px;" type="text" placeholder="Titulo" class="form-control" required name="titulo" >
                                                                        <i class="la la-envelope-o"></i>

                                                                        <input type="text" name="idProyecto" hidden value="{{$proyecto->id}}">
                                                                        <input type="text" name="authUserId" hidden value="{{Auth::user()->id}}">
                                                                    </div>
                                                                    <label for="descripcion" style="padding: 10px 0; color: grey">Descripción: </label>
                                                                    <div class="sn-field border-0">
                                                                        <textarea id="descripcion" style="padding: 10px 15px  40px; min-height: 250px; height: 100%;" type="text"  class="form-control" required name="descripcion" ></textarea>



                                                                    </div>
                                                                    <div class="modal-footer border-0">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                        <button type="submit" class="btn btnEnviar btn-primary">Añadir</button>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="widget widget-portfolio">
                                        <div class="wd-heady">
                                            <h3>Opciones</h3>
                                        </div>
                                        <div class="pf-gallery d-flex flex-column">
                                            <button type="button" class="btn btnEnviar btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">
                                                <i class="fa fa-user"></i> Añadir colaboradores
                                            </button>
                                            <button type="button" class="btn btnEnviar btn-primary my-2" data-toggle="modal" data-target="#comentarioModal">
                                                <i class="fa fa-file-text"></i> Añadir comentario
                                            </button>
                                            <button type="button" class="btn btn-primary btnEnviar my-2" data-toggle="modal" data-target="#cambiarImagen">
                                                <i class="fa fa-camera"></i> Cambiar portada
                                            </button>
                                            <button type="button" class="btn btn-primary btnEnviar my-2" data-toggle="modal" data-target="#anadirImagen">
                                                <i class="fa fa-file-archive-o"></i> Añadir archivo
                                            </button>




                                            <div class="modal fade" id="anadirImagen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3>Elige una imagen que quieras añadir a tu proyecto</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route("anadirImagenProyecto") }}" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="sn-field">
                                                                    <input type="file" required name="imgProyecto" hidden id="anadir">
                                                                    <button type="button" class="btn btnEnviar btn-primary"><label for="anadir">Añadir archivo</label></button>
                                                                    <input type="hidden" name="idProyecto" value="{{ $proyecto->id }}">
                                                                </div>
                                                                {!! $errors->first('email','<p style="color:red;">:message</p>') !!}
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                    <button type="submit" class="btn btnEnviar btn-primary">Subir archivo</button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--pf-gallery end-->
                                    </div><!--widget-portfolio end-->
                                </div><!--right-sidebar end-->
                            </div>
                        </div>
                    </div><!-- main-section-data end-->
                </div>
            </div>
        </main>



    </div><!--theme-layout end-->



@endsection
@section("scripts")
    <script src="typescript/validaciones.js"></script>
@endsection
