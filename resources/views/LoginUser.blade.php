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
                                    <img src="https://upload.wikimedia.org/wikipedia/en/e/e0/Escudouatf.png" height="150px" width="80px">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="login-details">
                                    <ul class="nav nav-tabs navbar-right">
                                        <li><a data-toggle="tab" id="alog" href="#login">Ingresar</a></li>
                                    </ul>
                                </di2v>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content">
                        <div id="login" class="tab-pane">
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
                                                
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-lg">Aceptar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function(){
        $('a#alog').click();
        console.log('entro');
    });
    </script>
@endsection
