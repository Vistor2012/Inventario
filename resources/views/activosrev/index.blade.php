@extends('layouts.app')

@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endpush

@section('navbar')
  @include('navbar')
@endsection

@section('content')
<div class="box">
  <div class="box-header with-border">
    <center><h1 class="box-title">Lista de Activos Importados</h1></center>
    <div class="col-xs-2" role="group" >
        <a href="{{ route('oficinas.index') }}">
            <button type="button" class="btn btn-primary btn-block">Oficinas</button>
        </a>
    </div>
  </div>
  <br>
  <br>
  <div class="box-body col-md-10 col-xs-offset-1">
    <br>
    <table id="table_id" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Codigo </th>
          <th>Descripcion</th>
          <th>Descripcion Detallada</th>
          <th>Cantidad</th>
          <th>Codigo de oficina</th>
          <th>Estado del Bien</th>

      </thead>
      <tbody>
        @foreach($activorev as $acti)
        <tr>
          <td>{{ $acti->codigo }}</td>
          <td>{{ $acti->act_des }}</td>
          <td>{{ $acti->act_des_det }}</td>
          <td>{{ $acti->act_can }}</td>
          <td>{{ $acti->act_ofc_cod}}</td>
          <td>{{ $acti->act_estado }}</td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
      </tfoot>
    </table>
  </div>
  <div class="box-footer">
  </div>
</div>
@endsection
@push('scripts')

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script>
  $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  });

  $(document).ready( function () {
    $('#table_id').DataTable({
      language: {
        url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
      }
    });
  });
</script>
@endpush