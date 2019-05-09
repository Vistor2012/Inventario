@extends('layouts.app')
@section('content')
<div class="box">
  <div class="box-header with-border">
    <center><h1 class="box-title">Lista de Oficinas</h1></center>
      <div class="col-md-6">
        <div class="input-group">
          <form action="{{ route('import')}}" method="POST" enctype="multipart/form-data">
            <span class="input-group-prepend">
              {{ csrf_field() }}
              <input type="file" name="import_file" class="from-control" />
              <input type="submit" name="Import"class="btn btn-primary" />    
            </span>
          </form>
        </div>
      </div>
      <div class="col-md-4">
        <form action="/search" method="get" >
          <div class="input-group">
            <input type="search" name="search" class="from-control">
            <span class="input-group-prepend">
              {{ csrf_field() }}
              <button type="submit" class="btn btn-primary">Buscar Oficina</button>
            </span>
          </div>
        </form>
      </div>
  </div>
  <div class="box-body col-md-12">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID Oficina</th>
          <th>Codigo Oficina</th>
          <th>Oficina Soa</th>
          <th>Descripcion</th>
          <th>Gestion</th>
          <th>Descripcion de Oficina</th>

          <th>Opciones</th>
        </tr>
      </thead>
      
      <tbody>
        @foreach($oficina as $ofi)
        <tr>
          <td>{{ $ofi->id_oficina }}</td>
          <td>{{ $ofi->ofc_cod }}</td>
          <td>{{ $ofi->soa_cod }}</td>
          <td>{{ $ofi->ofc_des }}</td>
          <td>{{ $ofi->ofi_ges }}</td>
          <td>{{ $ofi->ofi_des }}</td>
          <td>
            <a href="{{ route('oficinas.show', $ofi->ofc_cod) }}">
              <button type="button" class="btn btn-primary">Ver Activos</button>
            </a>
            <a href="{{ url('pdf') }}/{{ $ofi->ofc_cod }}">
              <button type="button" class="btn btn-primary">Descargar</button>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="row justify-content-center">
    {{ $oficina->links() }}
  </div>
</div>
@endsection



