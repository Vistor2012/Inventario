@extends('layouts.app')
@section('content')
<div class="box">
  <div class="box-header with-border">
    <center><h1 class="box-title">Lista de Oficinas</h1></center>
    <br>
      <div class="col-md-8 col-xs-offset-2">
        <form action="/search" method="get" >
          <div class="row">
            <div class="col-xs-8">
              <input type="search" name="search" class="form-control">
            </div>
            <div class="col-xs-4">
              {{ csrf_field() }}
              <button type="submit" class="btn btn-primary">Buscar Oficina</button>
            </div>
          </div>
        </form>
      </div>
  </div>
  <br>
  <br>
  <br>
  <div class="row">
    <div class="box-body col-md-10 col-xs-offset-1">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Codigo Oficina</th>
            <th>Descripcion</th>
            <th>Opciones</th>
          </tr>
        </thead>
        
        <tbody>
          @foreach($oficina as $ofi)
          <tr>
            <td>{{ $ofi->ofc_cod }}</td>
            <td>{{ $ofi->ofc_des }}</td>
            <td class="text-center">
              <a href="{{ route('oficinas.show', $ofi->ofc_cod) }}">
                <button type="button" class="btn btn-primary btn-xs">Ver Activos</button>
              </a>
              <a href="{{ route('pdf', ['ofc_cod' => $ofi->ofc_cod])}}">
                <button type="button" class="btn btn-primary btn-xs">Descargar</button>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="row">
    <center>
    {{ $oficina->links() }}
    </center>
  </div>
</div>
@endsection



