<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}"><img src="https://upload.wikimedia.org/wikipedia/en/e/e0/Escudouatf.png" width="35px" height="35px" style="margin-top: -7px;"></a>
            <a class="navbar-brand"> UATF - Sistema de Inventarios</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('oficinas.index') }}"><i class="glyphicon glyphicon-book"></i> Oficinas y Unidades</a></li>
                <li><a href="{{ route('inventarios.index') }}"><i class="glyphicon glyphicon-edit"></i> Realizar Inventario</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> {{Auth::user()->nombres}} {{Auth::user()->paterno}} {{Auth::user()->materno}} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('logout')}}"><i class="glyphicon glyphicon-log-out"></i> Salir</a></li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>