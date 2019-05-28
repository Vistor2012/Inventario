@extends('layouts.app')
@push('styles')
<style type="text/css">
  .modal-backdrop{display: none;}
</style>
@endpush
@section('content')
<div>
    <div class="container">
      <div class="row" style="padding-top: 20%;">
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
      </div>
    </div>
</div> 
@endsection