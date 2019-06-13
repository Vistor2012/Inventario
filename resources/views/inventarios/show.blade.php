@extends('layouts.app')

@push('styles')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endpush

@section('navbar')
  @include('navbar')
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <center><h1 class="box-title">Detalle del Inventario</h1></center>
    </div>
  </div>
  <br>
  <br>
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <table id="table_id" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th style="width: 3%;" class="text-center">Verificación</th>
          <th style="width: 3%;" class="text-center">Codigo</th>
          <th style="width: 30%;" class="text-center">Descripcion Detallada</th>
          <th style="width: 5%;" class="text-center">Cantidad</th>
          <th style="width: 12%;" class="text-center">Estado</th>
          <th style="width: 10%;" class="text-center">Valor Neto</th>
          <th style="width: 20%;" class="text-center">Observacion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($detalle as $det)
          <tr>
            <td class="text-center">{{ $det->exi_act }}</td>
            <td class="text-center">{{ $det->act_codigo }}</td>
            <td class="text-center">{{ $det->act_des_det }}</td>
            <td class="text-center">{{ $det->act_can }}</td>
            <td class="text-center">{{ $det->act_estado }}</td>
            <td class="text-center">{{ $det->act_val_neto }}</td>
            <td class="text-center">{{ $det->observacion }}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@push('scripts')
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
  <script type="text/javascript">
    $(document).ready( function () {
      $('#table_id').DataTable({
        language: {
          url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json',
        }
      });
    });
  </script>
@endpush