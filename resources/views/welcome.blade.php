<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UATF</title>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <!-- <script src="javascript/tabla.js"></script>
    <script  src="../../Jquery/prettify.js"></script> -->
</head>
<body>
    <div class="container">
      <div class="row">
          <div class="btn-group" role="group" aria-label="Basic example">
              <div class="container">
                  <div class="row">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <div class="btn-group" role="group">
                            <a href="{{ route('oficinas.index') }}">
                                <button type="button" class="btn btn-primary">Ingresar</button>
                            </a>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="btn-group" role="group" aria-label="Basic example">
              <div class="container">
                  <div class="row">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <div class="btn-group" role="group">
                            <a href="{{ route('inventarios.index') }}">
                                <button type="button" class="btn btn-primary">Realizar Inventario</button>
                            </a>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
</body>
    
</html>
