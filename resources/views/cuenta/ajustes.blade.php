@extends("layouts.app")

@section("content")

    <section class="profile-account-setting">
        <div class="container">
            <div class="account-tabs-setting">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="acc-leftbar">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-acc-tab" data-toggle="tab" href="#nav-acc" role="tab" aria-controls="nav-acc" aria-selected="true"><i class="la la-cogs"></i>Ajustes de cuenta</a>
                                <a class="nav-item nav-link" id="nav-password-tab" data-toggle="tab" href="#nav-password" role="tab" aria-controls="nav-password" aria-selected="false"><i class="fa fa-lock"></i>Cambiar contraseña</a>
                                <a class="nav-item nav-link" id="nav-deactivate-tab" data-toggle="tab" href="#nav-deactivate" role="tab" aria-controls="nav-deactivate" aria-selected="false"><i class="fa fa-random"></i>Borrar Cuenta</a>
                            </div>
                        </div><!--acc-leftbar end-->
                    </div>
                    <div class="col-lg-9">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-acc" role="tabpanel" aria-labelledby="nav-acc-tab">
                                <div class="acc-setting">
                                    <h3>Ajustes de cuenta</h3>
                                    <form action="{{ route('modificarDatosUsuario') }}" method="POST">
                                        @csrf

                                        <div class="cp-field">
                                            <h5>Nombre</h5>
                                            <div class="cpp-fiel">
                                                <input type="text" name="name" placeholder="Nombre" value="{{ Auth::user()->name }}">
                                                <i class="la la-user"></i>
                                            </div>
                                        </div>
                                        <input type="hidden" name="idUsuario" value="{{ Auth::user()->id}}">
                                        <div class="cp-field">
                                            <h5>Apellido</h5>
                                            <div class="cpp-fiel">
                                                <input type="text" name="surname" placeholder="Apellido" value="{{ Auth::user()->surname  }}">
                                                <i class="la la-user"></i>
                                            </div>
                                        </div>
                                        <div class="cp-field">
                                            <h5>Email</h5>
                                            <div class="cpp-fiel">
                                                <input type="text" name="email" placeholder="Email" value="{{ Auth::user()->email }}">
                                                <i class="la la-at"></i>
                                            </div>
                                        </div>
                                        <div class="save-stngs pd2">
                                            <ul>
                                                <li><button type="submit">Save Setting</button></li>
                                                <li><button type="reset">Restore Setting</button></li>
                                            </ul>
                                        </div><!--save-stngs end-->
                                        @if ($errors->any())
                                            <div class="alert alert-danger" style="margin-top: 10px;">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </form>
                                </div><!--acc-setting end-->
                            </div>

                            <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">
                                <div class="acc-setting">
                                    <h3>Cambiar contraseña</h3>
                                    <form action="{{route('cambiarContrasena')}}" method="POST">
                                        @csrf
                                        <div class="cp-field">
                                            <h5>Contraseña antigua</h5>
                                            <div class="cpp-fiel">
                                                <input type="password" name="old-password" placeholder="Contraseña antigua">
                                                <i class="fa fa-lock"></i>
                                            </div>
                                        </div>
                                        <div class="cp-field">
                                            <h5>Contraseña nueva</h5>
                                            <div class="cpp-fiel">
                                                <input type="password" name="new-password" placeholder="Contraseña nueva">
                                                <i class="fa fa-lock"></i>
                                            </div>
                                        </div>
                                        <div class="cp-field">
                                            <h5>Repite la contraseña</h5>
                                            <div class="cpp-fiel">
                                                <input type="password" name="repeat-password" placeholder="Repite la contraseña">
                                                <i class="fa fa-lock"></i>
                                            </div>
                                        </div>
                                        <div class="save-stngs pd2">
                                            <ul>
                                                <li><button type="submit">Save Setting</button></li>
                                                <li><button type="reset">Restore Setting</button></li>
                                            </ul>
                                        </div><!--save-stngs end-->
                                        @if ($errors->any())
                                            <div class="alert alert-danger" style="margin-top: 10px;">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </form>
                                </div><!--acc-setting end-->
                            </div>

                            <div class="tab-pane fade" id="nav-deactivate" role="tabpanel" aria-labelledby="nav-deactivate-tab">
                                <div class="acc-setting">
                                    <h3>Borrar cuenta</h3>
                                    <form>
                                        <div class="cp-field">
                                            <h5>Email</h5>
                                            <div class="cpp-fiel">
                                                <input type="text" name="email" placeholder="Email">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                        </div>
                                        <div class="cp-field">
                                            <h5>Password</h5>
                                            <div class="cpp-fiel">
                                                <input type="password" name="password" placeholder="Password">
                                                <i class="fa fa-lock"></i>
                                            </div>
                                        </div>
                                        <div class="cp-field">
                                            <h5>Please Explain Further</h5>
                                            <textarea></textarea>
                                        </div>
                                        <div class="cp-field">
                                            <div class="fgt-sec">
                                                <input type="checkbox" name="cc" id="c4">
                                                <label for="c4">
                                                    <span></span>
                                                </label>
                                                <small>Email option out</small>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pretium nulla quis erat dapibus, varius hendrerit neque suscipit. Integer in ex euismod, posuere lectus id,</p>
                                        </div>
                                        <div class="save-stngs pd3">
                                            <ul>
                                                <li><button type="submit">Save Setting</button></li>
                                                <li><button type="submit">Restore Setting</button></li>
                                            </ul>
                                        </div><!--save-stngs end-->
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
