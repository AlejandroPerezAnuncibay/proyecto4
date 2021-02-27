@extends("layouts.app")

@section("content")






    <body>


    <div class="wrapper">


        <section class="cover-sec">
            <img src="{{ $proyecto->imagen }}" alt="No hay imagen de proyecto">
            <a href="#" title=""><i class="fa fa-camera"></i> Cambiar imagen</a>
        </section>


        <main>
            <div class="main-section">
                <div class="container">
                    <div class="main-section-data">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="main-left-sidebar">
                                    <div class="user_profile">

                                        <div class="user_pro_status">
                                            <ul class="flw-hr">
                                                <li><!-- Button trigger modal -->
                                                    <button type="button" class="btn btnEnviar btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                        +  Añadir colaboradores
                                                    </button>
                                                    @if(isset($error))
                                                        <small style="color: red">{{ $error }}</small>
                                                @endif
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
                                                </li>
                                            </ul>


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
                                                <h3 style="text-align: center">No hay colaboradores</h3>
                                            @endif


                                        </div><!--suggestions-list end-->
                                    </div><!--suggestions end-->
                                </div><!--main-left-sidebar end-->
                            </div>
                            <div class="col-lg-6">
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
                                                        </div>
                                                        <label for="descripcionTarea" style="padding: 10px 0; color: grey">Descripción: </label><br>
                                                        <div class="sn-field border-0">
                                                            <textarea id="descripcionTarea" style="padding: 10px 15px  40px; min-height: 100px;max-height: 100px;" type="text"  class="form-control" required name="descripcion" ></textarea>

                                                        </div>
                                                        <label for="usuarioAsignado" style="margin: 10px 0; color: grey">Usuario Asignado:</label><br>

                                                        <div class="sn-field">

                                                            <select name="usuarioAsignado" style="padding: 6px 15px 10px 40px;" class="form-control" id="usuarioAsignado">
                                                                <option value="{{$creador->id}}">{{$creador->email}}</option>
                                                                @foreach($colaboradores as $colaborador)
                                                                    <option value="{{$colaborador->id}}">{{$colaborador->email}}</option>
                                                                @endforeach
                                                            </select>
                                                            <i class="la la-caret-down"></i>
                                                        </div>
                                                        <label for="fechaVencimiento" style="margin: 10px 0; color: grey">Fecha de vencimiento:</label><br>

                                                        <div class="sn-field">
                                                            <input type="date" name="fechaVencimiento" class="form-control" id="fechaVencimiento">

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
                                    <div class="product-feed-tab" id="info-dd">

                                        <div class="tarea-btn">

                                            <ul class="flw-hr">
                                                <li><!-- Button trigger modal -->
                                                    <button type="button" class="btn btnEnviar btn-primary" data-toggle="modal" data-target="#tareaModal">
                                                        <i class="la la-file-text"></i> Añadir tarea
                                                    </button>
                                                    @if(isset($error))
                                                        <small style="color: red">{{ $error }}</small>
                                                @endif
                                                <!-- Modal -->

                                                </li>
                                            </ul>
                                        </div>
                                        @if(count($tareas)>0)
                                            @foreach($tareas as $tarea)
                                                <div class="user-profile-ov">
                                                    <h3><a href="#" title="" class="overview-open">{{$tarea->titulo}}</a> <a href="#" title="" class="overview-open"><i class="fa fa-pencil"></i></a></h3>
                                                    <small><!--UsuarioAsignado--></small>
                                                    <p>{{$tarea->descripcion}}</p>

                                                </div><!--user-profile-ov end-->
                                            @endforeach
                                        @endif

                                        <div class="user-profile-ov st2">
                                            <h3><a href="#" title="" class="exp-bx-open">Experience </a><a href="#" title="" class="exp-bx-open"><i class="fa fa-pencil"></i></a> <a href="#" title="" class="exp-bx-open"><i class="fa fa-plus-square"></i></a></h3>
                                            <h4>Web designer <a href="#" title=""><i class="fa fa-pencil"></i></a></h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. </p>
                                            <h4>UI / UX Designer <a href="#" title=""><i class="fa fa-pencil"></i></a></h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id.</p>
                                            <h4>PHP developer <a href="#" title=""><i class="fa fa-pencil"></i></a></h4>
                                            <p class="no-margin">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. </p>
                                        </div><!--user-profile-ov end-->
                                        <div class="user-profile-ov">
                                            <h3><a href="#" title="" class="ed-box-open">Education</a> <a href="#" title="" class="ed-box-open"><i class="fa fa-pencil"></i></a> <a href="#" title=""><i class="fa fa-plus-square"></i></a></h3>
                                            <h4>Master of Computer Science</h4>
                                            <span>2015 - 2018</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. </p>
                                        </div><!--user-profile-ov end-->
                                        <div class="user-profile-ov">
                                            <h3><a href="#" title="" class="lct-box-open">Location</a> <a href="#" title="" class="lct-box-open"><i class="fa fa-pencil"></i></a> <a href="#" title=""><i class="fa fa-plus-square"></i></a></h3>
                                            <h4>India</h4>
                                            <p>151/4 BT Chownk, Delhi </p>
                                        </div><!--user-profile-ov end-->
                                        <div class="user-profile-ov">
                                            <h3><a href="#" title="" class="skills-open">Skills</a> <a href="#" title="" class="skills-open"><i class="fa fa-pencil"></i></a> <a href="#"><i class="fa fa-plus-square"></i></a></h3>
                                            <ul>
                                                <li><a href="#" title="">HTML</a></li>
                                                <li><a href="#" title="">PHP</a></li>
                                                <li><a href="#" title="">CSS</a></li>
                                                <li><a href="#" title="">Javascript</a></li>
                                                <li><a href="#" title="">Wordpress</a></li>
                                                <li><a href="#" title="">Photoshop</a></li>
                                                <li><a href="#" title="">Illustrator</a></li>
                                                <li><a href="#" title="">Corel Draw</a></li>
                                            </ul>
                                        </div><!--user-profile-ov end-->
                                    </div><!--product-feed-tab end-->
                                    <div class="product-feed-tab" id="saved-jobs">
                                        <div class="posts-section">
                                            <div class="post-bar">
                                                <div class="post_topbar">
                                                    <div class="usy-dt">
                                                        <img src="http://via.placeholder.com/50x50" alt="">
                                                        <div class="usy-name">
                                                            <h3>John Doe</h3>
                                                            <span><img src="../../../../public/images/clock.png" alt="">3 min ago</span>
                                                        </div>
                                                    </div>
                                                    <div class="ed-opts">
                                                        <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                        <ul class="ed-options">
                                                            <li><a href="#" title="">Edit Post</a></li>
                                                            <li><a href="#" title="">Unsaved</a></li>
                                                            <li><a href="#" title="">Unbid</a></li>
                                                            <li><a href="#" title="">Close</a></li>
                                                            <li><a href="#" title="">Hide</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="epi-sec">
                                                    <ul class="descp">
                                                        <li><img src="../../../../public/images/icon8.png" alt=""><span>Epic Coder</span></li>
                                                        <li><img src="../../../../public/images/icon9.png" alt=""><span>India</span></li>
                                                    </ul>
                                                    <ul class="bk-links">
                                                        <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                                                        <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="job_descp">
                                                    <h3>Senior Wordpress Developer</h3>
                                                    <ul class="job-dt">
                                                        <li><a href="#" title="">Full Time</a></li>
                                                        <li><span>$30 / hr</span></li>
                                                    </ul>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
                                                    <ul class="skill-tags">
                                                        <li><a href="#" title="">HTML</a></li>
                                                        <li><a href="#" title="">PHP</a></li>
                                                        <li><a href="#" title="">CSS</a></li>
                                                        <li><a href="#" title="">Javascript</a></li>
                                                        <li><a href="#" title="">Wordpress</a></li>
                                                    </ul>
                                                </div>
                                                <div class="job-status-bar">
                                                    <ul class="like-com">
                                                        <li>
                                                            <a href="#"><i class="la la-heart"></i> Like</a>
                                                            <img src="../../../../public/images/liked-img.png" alt="">
                                                            <span>25</span>
                                                        </li>
                                                        <li><a href="#" title="" class="com"><img src="../../../../public/images/com.png" alt=""> Comment 15</a></li>
                                                    </ul>
                                                    <a><i class="la la-eye"></i>Views 50</a>
                                                </div>
                                            </div><!--post-bar end-->
                                            <div class="post-bar">
                                                <div class="post_topbar">
                                                    <div class="usy-dt">
                                                        <img src="http://via.placeholder.com/50x50" alt="">
                                                        <div class="usy-name">
                                                            <h3>John Doe</h3>
                                                            <span><img src="../../../../public/images/clock.png" alt="">3 min ago</span>
                                                        </div>
                                                    </div>
                                                    <div class="ed-opts">
                                                        <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                        <ul class="ed-options">
                                                            <li><a href="#" title="">Edit Post</a></li>
                                                            <li><a href="#" title="">Unsaved</a></li>
                                                            <li><a href="#" title="">Unbid</a></li>
                                                            <li><a href="#" title="">Close</a></li>
                                                            <li><a href="#" title="">Hide</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="epi-sec">
                                                    <ul class="descp">
                                                        <li><img src="../../../../public/images/icon8.png" alt=""><span>Epic Coder</span></li>
                                                        <li><img src="../../../../public/images/icon9.png" alt=""><span>India</span></li>
                                                    </ul>
                                                    <ul class="bk-links">
                                                        <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                                                        <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="job_descp">
                                                    <h3>Senior Wordpress Developer</h3>
                                                    <ul class="job-dt">
                                                        <li><a href="#" title="">Full Time</a></li>
                                                        <li><span>$30 / hr</span></li>
                                                    </ul>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
                                                    <ul class="skill-tags">
                                                        <li><a href="#" title="">HTML</a></li>
                                                        <li><a href="#" title="">PHP</a></li>
                                                        <li><a href="#" title="">CSS</a></li>
                                                        <li><a href="#" title="">Javascript</a></li>
                                                        <li><a href="#" title="">Wordpress</a></li>
                                                    </ul>
                                                </div>
                                                <div class="job-status-bar">
                                                    <ul class="like-com">
                                                        <li>
                                                            <a href="#"><i class="la la-heart"></i> Like</a>
                                                            <img src="../../../../public/images/liked-img.png" alt="">
                                                            <span>25</span>
                                                        </li>
                                                        <li><a href="#" title="" class="com"><img src="../../../../public/images/com.png" alt=""> Comment 15</a></li>
                                                    </ul>
                                                    <a><i class="la la-eye"></i>Views 50</a>
                                                </div>
                                            </div><!--post-bar end-->
                                            <div class="post-bar">
                                                <div class="post_topbar">
                                                    <div class="usy-dt">
                                                        <img src="http://via.placeholder.com/50x50" alt="">
                                                        <div class="usy-name">
                                                            <h3>John Doe</h3>
                                                            <span><img src="../../../../public/images/clock.png" alt="">3 min ago</span>
                                                        </div>
                                                    </div>
                                                    <div class="ed-opts">
                                                        <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                        <ul class="ed-options">
                                                            <li><a href="#" title="">Edit Post</a></li>
                                                            <li><a href="#" title="">Unsaved</a></li>
                                                            <li><a href="#" title="">Unbid</a></li>
                                                            <li><a href="#" title="">Close</a></li>
                                                            <li><a href="#" title="">Hide</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="epi-sec">
                                                    <ul class="descp">
                                                        <li><img src="../../../../public/images/icon8.png" alt=""><span>Epic Coder</span></li>
                                                        <li><img src="../../../../public/images/icon9.png" alt=""><span>India</span></li>
                                                    </ul>
                                                    <ul class="bk-links">
                                                        <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                                                        <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="job_descp">
                                                    <h3>Senior Wordpress Developer</h3>
                                                    <ul class="job-dt">
                                                        <li><a href="#" title="">Full Time</a></li>
                                                        <li><span>$30 / hr</span></li>
                                                    </ul>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
                                                    <ul class="skill-tags">
                                                        <li><a href="#" title="">HTML</a></li>
                                                        <li><a href="#" title="">PHP</a></li>
                                                        <li><a href="#" title="">CSS</a></li>
                                                        <li><a href="#" title="">Javascript</a></li>
                                                        <li><a href="#" title="">Wordpress</a></li>
                                                    </ul>
                                                </div>
                                                <div class="job-status-bar">
                                                    <ul class="like-com">
                                                        <li>
                                                            <a href="#"><i class="la la-heart"></i> Like</a>
                                                            <img src="../../../../public/images/liked-img.png" alt="">
                                                            <span>25</span>
                                                        </li>
                                                        <li><a href="#" title="" class="com"><img src="../../../../public/images/com.png" alt=""> Comment 15</a></li>
                                                    </ul>
                                                    <a><i class="la la-eye"></i>Views 50</a>
                                                </div>
                                            </div><!--post-bar end-->
                                            <div class="post-bar">
                                                <div class="post_topbar">
                                                    <div class="usy-dt">
                                                        <img src="http://via.placeholder.com/50x50" alt="">
                                                        <div class="usy-name">
                                                            <h3>John Doe</h3>
                                                            <span><img src="../../../../public/images/clock.png" alt="">3 min ago</span>
                                                        </div>
                                                    </div>
                                                    <div class="ed-opts">
                                                        <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                        <ul class="ed-options">
                                                            <li><a href="#" title="">Edit Post</a></li>
                                                            <li><a href="#" title="">Unsaved</a></li>
                                                            <li><a href="#" title="">Unbid</a></li>
                                                            <li><a href="#" title="">Close</a></li>
                                                            <li><a href="#" title="">Hide</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="epi-sec">
                                                    <ul class="descp">
                                                        <li><img src="../../../../public/images/icon8.png" alt=""><span>Epic Coder</span></li>
                                                        <li><img src="../../../../public/images/icon9.png" alt=""><span>India</span></li>
                                                    </ul>
                                                    <ul class="bk-links">
                                                        <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                                                        <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="job_descp">
                                                    <h3>Senior Wordpress Developer</h3>
                                                    <ul class="job-dt">
                                                        <li><a href="#" title="">Full Time</a></li>
                                                        <li><span>$30 / hr</span></li>
                                                    </ul>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
                                                    <ul class="skill-tags">
                                                        <li><a href="#" title="">HTML</a></li>
                                                        <li><a href="#" title="">PHP</a></li>
                                                        <li><a href="#" title="">CSS</a></li>
                                                        <li><a href="#" title="">Javascript</a></li>
                                                        <li><a href="#" title="">Wordpress</a></li>
                                                    </ul>
                                                </div>
                                                <div class="job-status-bar">
                                                    <ul class="like-com">
                                                        <li>
                                                            <a href="#"><i class="la la-heart"></i> Like</a>
                                                            <img src="../../../../public/images/liked-img.png" alt="">
                                                            <span>25</span>
                                                        </li>
                                                        <li><a href="#" title="" class="com"><img src="../../../../public/images/com.png" alt=""> Comment 15</a></li>
                                                    </ul>
                                                    <a><i class="la la-eye"></i>Views 50</a>
                                                </div>
                                            </div><!--post-bar end-->
                                            <div class="process-comm">
                                                <a href="#" title=""><img src="../../../../public/images/process-icon.png" alt=""></a>
                                            </div><!--process-comm end-->
                                        </div><!--posts-section end-->
                                    </div><!--product-feed-tab end-->
                                    <div class="product-feed-tab" id="my-bids">
                                        <div class="posts-section">
                                            <div class="post-bar">
                                                <div class="post_topbar">
                                                    <div class="usy-dt">
                                                        <img src="http://via.placeholder.com/50x50" alt="">
                                                        <div class="usy-name">
                                                            <h3>John Doe</h3>
                                                            <span><img src="../../../../public/images/clock.png" alt="">3 min ago</span>
                                                        </div>
                                                    </div>
                                                    <div class="ed-opts">
                                                        <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                        <ul class="ed-options">
                                                            <li><a href="#" title="">Edit Post</a></li>
                                                            <li><a href="#" title="">Unsaved</a></li>
                                                            <li><a href="#" title="">Unbid</a></li>
                                                            <li><a href="#" title="">Close</a></li>
                                                            <li><a href="#" title="">Hide</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="epi-sec">
                                                    <ul class="descp">
                                                        <li><img src="../../../../public/images/icon8.png" alt=""><span>Frontend Developer</span></li>
                                                        <li><img src="../../../../public/images/icon9.png" alt=""><span>India</span></li>
                                                    </ul>
                                                    <ul class="bk-links">
                                                        <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                                                        <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                                                        <li><a href="#" title="" class="bid_now">Bid Now</a></li>
                                                    </ul>
                                                </div>
                                                <div class="job_descp">
                                                    <h3>Simple Classified Site</h3>
                                                    <ul class="job-dt">
                                                        <li><span>$300 - $350</span></li>
                                                    </ul>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
                                                    <ul class="skill-tags">
                                                        <li><a href="#" title="">HTML</a></li>
                                                        <li><a href="#" title="">PHP</a></li>
                                                        <li><a href="#" title="">CSS</a></li>
                                                        <li><a href="#" title="">Javascript</a></li>
                                                        <li><a href="#" title="">Wordpress</a></li>
                                                        <li><a href="#" title="">Photoshop</a></li>
                                                        <li><a href="#" title="">Illustrator</a></li>
                                                        <li><a href="#" title="">Corel Draw</a></li>
                                                    </ul>
                                                </div>
                                                <div class="job-status-bar">
                                                    <ul class="like-com">
                                                        <li>
                                                            <a href="#"><i class="la la-heart"></i> Like</a>
                                                            <img src="../../../../public/images/liked-img.png" alt="">
                                                            <span>25</span>
                                                        </li>
                                                        <li><a href="#" title="" class="com"><img src="../../../../public/images/com.png" alt=""> Comment 15</a></li>
                                                    </ul>
                                                    <a><i class="la la-eye"></i>Views 50</a>
                                                </div>
                                            </div><!--post-bar end-->
                                            <div class="post-bar">
                                                <div class="post_topbar">
                                                    <div class="usy-dt">
                                                        <img src="http://via.placeholder.com/50x50" alt="">
                                                        <div class="usy-name">
                                                            <h3>John Doe</h3>
                                                            <span><img src="../../../../public/images/clock.png" alt="">3 min ago</span>
                                                        </div>
                                                    </div>
                                                    <div class="ed-opts">
                                                        <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                        <ul class="ed-options">
                                                            <li><a href="#" title="">Edit Post</a></li>
                                                            <li><a href="#" title="">Unsaved</a></li>
                                                            <li><a href="#" title="">Unbid</a></li>
                                                            <li><a href="#" title="">Close</a></li>
                                                            <li><a href="#" title="">Hide</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="epi-sec">
                                                    <ul class="descp">
                                                        <li><img src="../../../../public/images/icon8.png" alt=""><span>Frontend Developer</span></li>
                                                        <li><img src="../../../../public/images/icon9.png" alt=""><span>India</span></li>
                                                    </ul>
                                                    <ul class="bk-links">
                                                        <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                                                        <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                                                        <li><a href="#" title="" class="bid_now">Bid Now</a></li>
                                                    </ul>
                                                </div>
                                                <div class="job_descp">
                                                    <h3>Ios Shopping mobile app</h3>
                                                    <ul class="job-dt">
                                                        <li><span>$300 - $350</span></li>
                                                    </ul>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
                                                    <ul class="skill-tags">
                                                        <li><a href="#" title="">HTML</a></li>
                                                        <li><a href="#" title="">PHP</a></li>
                                                        <li><a href="#" title="">CSS</a></li>
                                                        <li><a href="#" title="">Javascript</a></li>
                                                        <li><a href="#" title="">Wordpress</a></li>
                                                        <li><a href="#" title="">Photoshop</a></li>
                                                        <li><a href="#" title="">Illustrator</a></li>
                                                        <li><a href="#" title="">Corel Draw</a></li>
                                                    </ul>
                                                </div>
                                                <div class="job-status-bar">
                                                    <ul class="like-com">
                                                        <li>
                                                            <a href="#"><i class="la la-heart"></i> Like</a>
                                                            <img src="../../../../public/images/liked-img.png" alt="">
                                                            <span>25</span>
                                                        </li>
                                                        <li><a href="#" title="" class="com"><img src="../../../../public/images/com.png" alt=""> Comment 15</a></li>
                                                    </ul>
                                                    <a><i class="la la-eye"></i>Views 50</a>
                                                </div>
                                            </div><!--post-bar end-->
                                            <div class="post-bar">
                                                <div class="post_topbar">
                                                    <div class="usy-dt">
                                                        <img src="http://via.placeholder.com/50x50" alt="">
                                                        <div class="usy-name">
                                                            <h3>John Doe</h3>
                                                            <span><img src="../../../../public/images/clock.png" alt="">3 min ago</span>
                                                        </div>
                                                    </div>
                                                    <div class="ed-opts">
                                                        <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                        <ul class="ed-options">
                                                            <li><a href="#" title="">Edit Post</a></li>
                                                            <li><a href="#" title="">Unsaved</a></li>
                                                            <li><a href="#" title="">Unbid</a></li>
                                                            <li><a href="#" title="">Close</a></li>
                                                            <li><a href="#" title="">Hide</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="epi-sec">
                                                    <ul class="descp">
                                                        <li><img src="../../../../public/images/icon8.png" alt=""><span>Frontend Developer</span></li>
                                                        <li><img src="../../../../public/images/icon9.png" alt=""><span>India</span></li>
                                                    </ul>
                                                    <ul class="bk-links">
                                                        <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                                                        <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                                                        <li><a href="#" title="" class="bid_now">Bid Now</a></li>
                                                    </ul>
                                                </div>
                                                <div class="job_descp">
                                                    <h3>Simple Classified Site</h3>
                                                    <ul class="job-dt">
                                                        <li><span>$300 - $350</span></li>
                                                    </ul>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
                                                    <ul class="skill-tags">
                                                        <li><a href="#" title="">HTML</a></li>
                                                        <li><a href="#" title="">PHP</a></li>
                                                        <li><a href="#" title="">CSS</a></li>
                                                        <li><a href="#" title="">Javascript</a></li>
                                                        <li><a href="#" title="">Wordpress</a></li>
                                                        <li><a href="#" title="">Photoshop</a></li>
                                                        <li><a href="#" title="">Illustrator</a></li>
                                                        <li><a href="#" title="">Corel Draw</a></li>
                                                    </ul>
                                                </div>
                                                <div class="job-status-bar">
                                                    <ul class="like-com">
                                                        <li>
                                                            <a href="#"><i class="la la-heart"></i> Like</a>
                                                            <img src="../../../../public/images/liked-img.png" alt="">
                                                            <span>25</span>
                                                        </li>
                                                        <li><a href="#" title="" class="com"><img src="../../../../public/images/com.png" alt=""> Comment 15</a></li>
                                                    </ul>
                                                    <a><i class="la la-eye"></i>Views 50</a>
                                                </div>
                                            </div><!--post-bar end-->
                                            <div class="post-bar">
                                                <div class="post_topbar">
                                                    <div class="usy-dt">
                                                        <img src="http://via.placeholder.com/50x50" alt="">
                                                        <div class="usy-name">
                                                            <h3>John Doe</h3>
                                                            <span><img src="../../../../public/images/clock.png" alt="">3 min ago</span>
                                                        </div>
                                                    </div>
                                                    <div class="ed-opts">
                                                        <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                        <ul class="ed-options">
                                                            <li><a href="#" title="">Edit Post</a></li>
                                                            <li><a href="#" title="">Unsaved</a></li>
                                                            <li><a href="#" title="">Unbid</a></li>
                                                            <li><a href="#" title="">Close</a></li>
                                                            <li><a href="#" title="">Hide</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="epi-sec">
                                                    <ul class="descp">
                                                        <li><img src="../../../../public/images/icon8.png" alt=""><span>Frontend Developer</span></li>
                                                        <li><img src="../../../../public/images/icon9.png" alt=""><span>India</span></li>
                                                    </ul>
                                                    <ul class="bk-links">
                                                        <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                                                        <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                                                        <li><a href="#" title="" class="bid_now">Bid Now</a></li>
                                                    </ul>
                                                </div>
                                                <div class="job_descp">
                                                    <h3>Ios Shopping mobile app</h3>
                                                    <ul class="job-dt">
                                                        <li><span>$300 - $350</span></li>
                                                    </ul>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
                                                    <ul class="skill-tags">
                                                        <li><a href="#" title="">HTML</a></li>
                                                        <li><a href="#" title="">PHP</a></li>
                                                        <li><a href="#" title="">CSS</a></li>
                                                        <li><a href="#" title="">Javascript</a></li>
                                                        <li><a href="#" title="">Wordpress</a></li>
                                                        <li><a href="#" title="">Photoshop</a></li>
                                                        <li><a href="#" title="">Illustrator</a></li>
                                                        <li><a href="#" title="">Corel Draw</a></li>
                                                    </ul>
                                                </div>
                                                <div class="job-status-bar">
                                                    <ul class="like-com">
                                                        <li>
                                                            <a href="#"><i class="la la-heart"></i> Like</a>
                                                            <img src="../../../../public/images/liked-img.png" alt="">
                                                            <span>25</span>
                                                        </li>
                                                        <li><a href="#" title="" class="com"><img src="../../../../public/images/com.png" alt=""> Comment 15</a></li>
                                                    </ul>
                                                    <a><i class="la la-eye"></i>Views 50</a>
                                                </div>
                                            </div><!--post-bar end-->
                                            <div class="process-comm">
                                                <a href="#" title=""><img src="../../../../public/images/process-icon.png" alt=""></a>
                                            </div><!--process-comm end-->
                                        </div><!--posts-section end-->
                                    </div><!--product-feed-tab end-->
                                    <div class="product-feed-tab" id="portfolio-dd">
                                        <div class="portfolio-gallery-sec">
                                            <h3>Portfolio</h3>
                                            <div class="gallery_pf">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                        <div class="gallery_pt">
                                                            <img src="http://via.placeholder.com/271x174" alt="">
                                                            <a href="#" title=""><img src="../../../../public/images/all-out.png" alt=""></a>
                                                        </div><!--gallery_pt end-->
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                        <div class="gallery_pt">
                                                            <img src="http://via.placeholder.com/170x170" alt="">
                                                            <a href="#" title=""><img src="../../../../public/images/all-out.png" alt=""></a>
                                                        </div><!--gallery_pt end-->
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                        <div class="gallery_pt">
                                                            <img src="http://via.placeholder.com/170x170" alt="">
                                                            <a href="#" title=""><img src="../../../../public/images/all-out.png" alt=""></a>
                                                        </div><!--gallery_pt end-->
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                        <div class="gallery_pt">
                                                            <img src="http://via.placeholder.com/170x170" alt="">
                                                            <a href="#" title=""><img src="../../../../public/images/all-out.png" alt=""></a>
                                                        </div><!--gallery_pt end-->
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                        <div class="gallery_pt">
                                                            <img src="http://via.placeholder.com/170x170" alt="">
                                                            <a href="#" title=""><img src="../../../../public/images/all-out.png" alt=""></a>
                                                        </div><!--gallery_pt end-->
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                        <div class="gallery_pt">
                                                            <img src="http://via.placeholder.com/170x170" alt="">
                                                            <a href="#" title=""><img src="../../../../public/images/all-out.png" alt=""></a>
                                                        </div><!--gallery_pt end-->
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                        <div class="gallery_pt">
                                                            <img src="http://via.placeholder.com/170x170" alt="">
                                                            <a href="#" title=""><img src="../../../../public/images/all-out.png" alt=""></a>
                                                        </div><!--gallery_pt end-->
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                        <div class="gallery_pt">
                                                            <img src="http://via.placeholder.com/170x170" alt="">
                                                            <a href="#" title=""><img src="../../../../public/images/all-out.png" alt=""></a>
                                                        </div><!--gallery_pt end-->
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                        <div class="gallery_pt">
                                                            <img src="http://via.placeholder.com/170x170" alt="">
                                                            <a href="#" title=""><img src="../../../../public/images/all-out.png" alt=""></a>
                                                        </div><!--gallery_pt end-->
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                        <div class="gallery_pt">
                                                            <img src="http://via.placeholder.com/170x170" alt="">
                                                            <a href="#" title=""><img src="../../../../public/images/all-out.png" alt=""></a>
                                                        </div><!--gallery_pt end-->
                                                    </div>
                                                </div>
                                            </div><!--gallery_pf end-->
                                        </div><!--portfolio-gallery-sec end-->
                                    </div><!--product-feed-tab end-->
                                    <div class="product-feed-tab" id="payment-dd">
                                        <div class="billing-method">
                                            <ul>
                                                <li>
                                                    <h3>Add Billing Method</h3>
                                                    <a href="#" title=""><i class="fa fa-plus-circle"></i></a>
                                                </li>
                                                <li>
                                                    <h3>See Activity</h3>
                                                    <a href="#" title="">View All</a>
                                                </li>
                                                <li>
                                                    <h3>Total Money</h3>
                                                    <span>$0.00</span>
                                                </li>
                                            </ul>
                                            <div class="lt-sec">
                                                <img src="../../../../public/images/lt-icon.png" alt="">
                                                <h4>All your transactions are saved here</h4>
                                                <a href="#" title="">Click Here</a>
                                            </div>
                                        </div><!--billing-method end-->
                                        <div class="add-billing-method">
                                            <h3>Add Billing Method</h3>
                                            <h4><img src="../../../../public/images/dlr-icon.png" alt=""><span>With workwise payment protection , only pay for work delivered.</span></h4>
                                            <div class="payment_methods">
                                                <h4>Credit or Debit Cards</h4>
                                                <form>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="cc-head">
                                                                <h5>Card Number</h5>
                                                                <ul>
                                                                    <li><img src="../../../../public/images/cc-icon1.png" alt=""></li>
                                                                    <li><img src="../../../../public/images/cc-icon2.png" alt=""></li>
                                                                    <li><img src="../../../../public/images/cc-icon3.png" alt=""></li>
                                                                    <li><img src="../../../../public/images/cc-icon4.png" alt=""></li>
                                                                </ul>
                                                            </div>
                                                            <div class="inpt-field pd-moree">
                                                                <input type="text" name="cc-number" placeholder="">
                                                                <i class="fa fa-credit-card"></i>
                                                            </div><!--inpt-field end-->
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="cc-head">
                                                                <h5>First Name</h5>
                                                            </div>
                                                            <div class="inpt-field">
                                                                <input type="text" name="f-name" placeholder="">
                                                            </div><!--inpt-field end-->
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="cc-head">
                                                                <h5>Last Name</h5>
                                                            </div>
                                                            <div class="inpt-field">
                                                                <input type="text" name="l-name" placeholder="">
                                                            </div><!--inpt-field end-->
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="cc-head">
                                                                <h5>Expiresons</h5>
                                                            </div>
                                                            <div class="rowwy">
                                                                <div class="row">
                                                                    <div class="col-lg-6 pd-left-none no-pd">
                                                                        <div class="inpt-field">
                                                                            <input type="text" name="f-name" placeholder="">
                                                                        </div><!--inpt-field end-->
                                                                    </div>
                                                                    <div class="col-lg-6 pd-right-none no-pd">
                                                                        <div class="inpt-field">
                                                                            <input type="text" name="f-name" placeholder="">
                                                                        </div><!--inpt-field end-->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="cc-head">
                                                                <h5>Cvv (Security Code) <i class="fa fa-question-circle"></i></h5>
                                                            </div>
                                                            <div class="inpt-field">
                                                                <input type="text" name="l-name" placeholder="">
                                                            </div><!--inpt-field end-->
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <button type="submit">Continue</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <h4>Add Paypal Account</h4>
                                            </div>
                                        </div><!--add-billing-method end-->
                                    </div><!--product-feed-tab end-->
                                </div><!--main-ws-sec end-->
                            </div>
                            <div class="col-lg-3">
                                <div class="right-sidebar">
                                    <div class="message-btn">

                                        <ul class="flw-hr">
                                            <li><!-- Button trigger modal -->
                                                <button type="button" class="btn btnEnviar btn-primary" data-toggle="modal" data-target="#comentarioModal">
                                                    <i class="la la-file-text"></i> Añadir comentario
                                                </button>
                                                @if(isset($error))
                                                    <small style="color: red">{{ $error }}</small>
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
                                            <h3>Portfolio</h3>
                                            <img src="../../../../public/images/photo-icon.png" alt="">
                                        </div>
                                        <div class="pf-gallery">
                                            <ul>
                                                <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                                <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                                <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                                <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                                <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                                <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                                <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                                <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                                <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                                <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                                <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                                <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                            </ul>
                                        </div><!--pf-gallery end-->
                                    </div><!--widget-portfolio end-->
                                </div><!--right-sidebar end-->
                            </div>
                        </div>
                    </div><!-- main-section-data end-->
                </div>
            </div>
        </main>



        <div class="overview-box" id="overview-box">
            <div class="overview-edit">
                <h3>Overview</h3>
                <span>5000 character left</span>
                <form>
                    <textarea></textarea>
                    <button type="submit" class="save">Save</button>
                    <button type="submit" class="cancel">Cancel</button>
                </form>
                <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
            </div><!--overview-edit end-->
        </div><!--overview-box end-->


        <div class="overview-box" id="experience-box">
            <div class="overview-edit">
                <h3>Experience</h3>
                <form>
                    <input type="text" name="subject" placeholder="Subject">
                    <textarea></textarea>
                    <button type="submit" class="save">Save</button>
                    <button type="submit" class="save-add">Save & Add More</button>
                    <button type="submit" class="cancel">Cancel</button>
                </form>
                <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
            </div><!--overview-edit end-->
        </div><!--overview-box end-->

        <div class="overview-box" id="education-box">
            <div class="overview-edit">
                <h3>Education</h3>
                <form>
                    <input type="text" name="school" placeholder="School / University">
                    <div class="datepicky">
                        <div class="row">
                            <div class="col-lg-6 no-left-pd">
                                <div class="datefm">
                                    <input type="text" name="from" placeholder="From" class="datepicker">
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                            <div class="col-lg-6 no-righ-pd">
                                <div class="datefm">
                                    <input type="text" name="to" placeholder="To" class="datepicker">
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="text" name="degree" placeholder="Degree">
                    <textarea placeholder="Description"></textarea>
                    <button type="submit" class="save">Save</button>
                    <button type="submit" class="save-add">Save & Add More</button>
                    <button type="submit" class="cancel">Cancel</button>
                </form>
                <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
            </div><!--overview-edit end-->
        </div><!--overview-box end-->

        <div class="overview-box" id="location-box">
            <div class="overview-edit">
                <h3>Location</h3>
                <form>
                    <div class="datefm">
                        <select>
                            <option>Country</option>
                            <option value="pakistan">Pakistan</option>
                            <option value="england">England</option>
                            <option value="india">India</option>
                            <option value="usa">United Sates</option>
                        </select>
                        <i class="fa fa-globe"></i>
                    </div>
                    <div class="datefm">
                        <select>
                            <option>City</option>
                            <option value="london">London</option>
                            <option value="new-york">New York</option>
                            <option value="sydney">Sydney</option>
                            <option value="chicago">Chicago</option>
                        </select>
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <button type="submit" class="save">Save</button>
                    <button type="submit" class="cancel">Cancel</button>
                </form>
                <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
            </div><!--overview-edit end-->
        </div><!--overview-box end-->

        <div class="overview-box" id="skills-box">
            <div class="overview-edit">
                <h3>Skills</h3>
                <ul>
                    <li><a href="#" title="" class="skl-name">HTML</a><a href="#" title="" class="close-skl"><i class="la la-close"></i></a></li>
                    <li><a href="#" title="" class="skl-name">php</a><a href="#" title="" class="close-skl"><i class="la la-close"></i></a></li>
                    <li><a href="#" title="" class="skl-name">css</a><a href="#" title="" class="close-skl"><i class="la la-close"></i></a></li>
                </ul>
                <form>
                    <input type="text" name="skills" placeholder="Skills">
                    <button type="submit" class="save">Save</button>
                    <button type="submit" class="save-add">Save & Add More</button>
                    <button type="submit" class="cancel">Cancel</button>
                </form>
                <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
            </div><!--overview-edit end-->
        </div><!--overview-box end-->

        <div class="overview-box" id="create-portfolio">
            <div class="overview-edit">
                <h3>Create Portfolio</h3>
                <form>
                    <input type="text" name="pf-name" placeholder="Portfolio Name">
                    <div class="file-submit">
                        <input type="file" name="file">
                    </div>
                    <div class="pf-img">
                        <img src="http://via.placeholder.com/60x60" alt="">
                    </div>
                    <input type="text" name="website-url" placeholder="htp://www.example.com">
                    <button type="submit" class="save">Save</button>
                    <button type="submit" class="cancel">Cancel</button>
                </form>
                <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
            </div><!--overview-edit end-->
        </div><!--overview-box end-->

    </div><!--theme-layout end-->







@endsection
