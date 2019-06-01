@extends('layouts.app')

@section('navbar')
    @include('navbar')
@endsection

@section('content')
<div>
    <div class="container">
        <div class="jumbotron">
            <h1>Navbar example</h1>
            <p>This example is a quick exercise to illustrate how the default, static navbar and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
            <p>
                <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">View navbar docs »</a>
            </p>
        </div>
        <!--<div class="row" style="padding-top: 20%;">
            <div class="col-md-offset-2 col-md-8">
                <div class="row">
                    <div class="col-xs-12">
                        <a href="{{ route('oficinas.index') }}">
                            <button type="button" class="btn btn-primary btn-block btn-lg"><i class="glyphicon glyphicon-book"></i> Oficinas e Unidades</button>
                         </a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-12">
                        <a href="{{ route('inventarios.index') }}">
                            <button type="button" class="btn btn-primary btn-block btn-lg"><i class="glyphicon glyphicon-edit"></i> Realizar Inventario</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>-->
    </div>
</div> 
@endsection