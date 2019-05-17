@extends('layouts.app')
@section('content')
<div>
    <div class="container">
      <div class="row">
          <div class="btn-group" role="group" aria-label="Basic example">
              <div class="btn-group" role="group">
                  <a href="{{ route('oficinas.index') }}">
                    <button type="button" class="btn btn-primary">Importar Archivos Excel</button>
                  </a>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="btn-group" role="group" aria-label="Basic example">
              <div class="btn-group" role="group">
                  <a href="{{ route('oficinas.index') }}">
                    <button type="button" class="btn btn-primary">Oficinas e Unidades</button>
                  </a>
              </div>
          </div>
      </div>
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
@endsection