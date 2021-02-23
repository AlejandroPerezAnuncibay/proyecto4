@extends("layouts.layout")

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
                                    <form>
                                        <div class="notbar">
                                            <h4>Notification Sound</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pretium nulla quis erat dapibus, varius hendrerit neque suscipit. Integer in ex euismod, posuere lectus id</p>
                                            <div class="toggle-btn">
                                                <a href="#" title=""><img src="images/up-btn.png" alt=""></a>
                                            </div>
                                        </div><!--notbar end-->
                                        <div class="notbar">
                                            <h4>Notification Email</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pretium nulla quis erat dapibus, varius hendrerit neque suscipit. Integer in ex euismod, posuere lectus id</p>
                                            <div class="toggle-btn">
                                                <a href="#" title=""><img src="images/up-btn.png" alt=""></a>
                                            </div>
                                        </div><!--notbar end-->
                                        <div class="notbar">
                                            <h4>Chat Message Sound</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pretium nulla quis erat dapibus, varius hendrerit neque suscipit. Integer in ex euismod, posuere lectus id</p>
                                            <div class="toggle-btn">
                                                <a href="#" title=""><img src="images/up-btn.png" alt=""></a>
                                            </div>
                                        </div><!--notbar end-->
                                        <div class="save-stngs">
                                            <ul>
                                                <li><button type="submit">Save Setting</button></li>
                                                <li><button type="submit">Restore Setting</button></li>
                                            </ul>
                                        </div><!--save-stngs end-->
                                    </form>
                                </div><!--acc-setting end-->
                            </div>

                            <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">
                                <div class="acc-setting">
                                    <h3>Cambiar contraseña</h3>
                                    <form>
                                        <div class="cp-field">
                                            <h5>Old Password</h5>
                                            <div class="cpp-fiel">
                                                <input type="text" name="old-password" placeholder="Old Password">
                                                <i class="fa fa-lock"></i>
                                            </div>
                                        </div>
                                        <div class="cp-field">
                                            <h5>New Password</h5>
                                            <div class="cpp-fiel">
                                                <input type="text" name="new-password" placeholder="New Password">
                                                <i class="fa fa-lock"></i>
                                            </div>
                                        </div>
                                        <div class="cp-field">
                                            <h5>Repeat Password</h5>
                                            <div class="cpp-fiel">
                                                <input type="text" name="repeat-password" placeholder="Repeat Password">
                                                <i class="fa fa-lock"></i>
                                            </div>
                                        </div>
                                        <div class="cp-field">
                                            <h5><a href="#" title="">Forgot Password?</a></h5>
                                        </div>
                                        <div class="save-stngs pd2">
                                            <ul>
                                                <li><button type="submit">Save Setting</button></li>
                                                <li><button type="submit">Restore Setting</button></li>
                                            </ul>
                                        </div><!--save-stngs end-->
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
