@extends ('layouts.app')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <style>
        body{
            background-color:red;
        }
        .container-login100{
            background-repeat: none;
            background-size: cover;
            background-image: url({{asset('imagenes/bg.jpg')}});
        }
    </style>
@endpush

@section('content')
    <div class="limiter" style="background-color:red;">
		<div class="container-login100">
			<div class="wrap-login100 p-t-10 p-b-20" style="border: solid 1px grey; padding:45px; background-color:#f2f2f2; border-radius: 25px;">
				<form class="login100-form validate-form" method="post" action="{{url('/verificar')}}">
					<span class="login100-form-title p-b-20" style="font-size:28px;">
                        Universidad Autónoma Tomás Frias
					</span>
					<span class="login100-form-avatar">
						<img src="https://upload.wikimedia.org/wikipedia/en/e/e0/Escudouatf.png" style="height:120px;" alt="AVATAR">
                    </span>
                    <span class="login100-form-title p-b-10" style="font-size:28px;">
                        <br>
                        Sistema de Inventarios
					</span>
					<div class="wrap-input100 validate-input m-t-35 m-b-35" data-validate = "Enter username">
						<input class="input100" type="text" name="usuario">
						<span class="focus-input100" data-placeholder="Usuario"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="password" name="clave">
						<span class="focus-input100" data-placeholder="Contraseña"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn"><i class="glyphicon glyphicon-log-in"></i>- Ingresar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

    <script>
    $(document).ready(function(){
        $('a#alog').click();
    });
    </script>
@endsection
