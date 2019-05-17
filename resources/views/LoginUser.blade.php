@extends ('layouts.app')
@section('content')
    <div class="login-area">
        <div class="bg-image">
            <div class="login-signup">
                <div class="container">
                    <div class="login-header">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="login-logo">
                                    <img src="imagenes/UATF-1.jpg" height="150px" width="80px">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="login-details">
                                    <ul class="nav nav-tabs navbar-right">
                                        <li><a data-toggle="tab" href="#register">Registro</a></li>
                                        <li class="active"><a data-toggle="tab" href="#login">Ingresar</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content">
                        <div id="register" class="tab-pane active">
                            <div class="login-inner">
                                <div class="title">
                                    <h1>Universidad Autonoma Tomas Frias</h1>
                                </div>
                                <div class="login-form">
                                    @include('error')
                                    <form action="{{url('/registrar')}}" method="POST">
                                        {{csrf_field()}}
                                        <div class="form-details">
                                            <label class="nro_dip">
                                                <input type="text" name="nro_dip" placeholder="Carnet de Identidad" id="nro_dip">
                                            </label>
                                            <label class="nombres">
                                                <input type="text" name="nombres" placeholder="Nombre Completo" id="nombres">
                                            </label>
                                            <label class="usuario">
                                                <input type="text" name="usuario" placeholder="Usuario" id="usuario">
                                            </label>
                                            <label class="clave">
                                                <input type="password" name="clave" placeholder="Contraseña" id="clave">
                                            </label>
                                        </div>
                                        <button type="submit" class="form-btn" >Aceptar</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div id="login" class="tab-pane fade in ">
                            <div class="login-inner">
                                <div class="title">
                                    <h1>Universidad Autonoma Tomas Frias</h1>
                                </div>
                                <div class="login-form">
                                    <form method="post" action="{{url('/verificar')}}">
                                        {{csrf_field()}}
                                        <div class="form-details">
                                            <label class="usuario">
                                                <input type="text" name="usuario" placeholder="Usuario" id="usuario">
                                            </label>
                                            <label class="clave">
                                                <input type="password" name="clave" placeholder="Contraseña" id="clave">
                                            </label>
                                            <label class="gestion">
                                                <input type="text" name="gestion" placeholder="Gestion" id="gestion">
                                            </label>
                                        </div>
                                        <button type="submit" class="form-btn">Aceptar</button>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@stop