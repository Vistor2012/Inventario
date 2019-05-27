@extends('layouts.app')

@push('styles')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endpush

@section('content')
<title>Detalle de Inventario</title>
	<div class="col-md-12 col-lg-12">
	 	<th><center><h1 class="box-title">Activos de {{$inv->inv_ofi_des}}</h1></center></th>
		<tr>
      <!--<div class="card body">
        <a href="{{ url('pdf') }}/{{ $ofi->ofc_cod }}">
          <button type="button" class="btn btn-primary">Imprimir</button>
        </a>
      </div>-->

			<div class="form-row">
        <table id="table_id" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Codigo </th>
              <th>Cantidad</th>
              <th>Pieza</th>
              <th>Descripcion Detallada</th>
              <th>Fecha de Adquisicion</th>
              <th>Estado del Bien</th>
              <th>Codigo QR</th>
          </thead>
          <tbody>
            <?php
              $activo=App\Activo::where('act_ofc_cod','=',$inv->inv_ofi_cod)->get();
            ?>
            @foreach($activo as $act)
            <tr>
              <td>{{ $act->codigo }}</td>
              <td>{{ $act->act_can }}</td>
              <td>{{ $act->act_des }}</td>
              <td>{{ $act->act_des_det }}</td>
              <td>{{ $act->act_fec_adq }}</td>
              <td>{{ $act->act_estado }}</td>
            </tr>
            @endforeach
            <?php
              $activorev=App\Activorev::where('act_ofc_cod','=',$inv->inv_ofi_cod)->get();
            ?>
            @foreach($activorev as $acti)
            <tr>
              <td>{{ $acti->codigo }}</td>
              <td>{{ $acti->act_can }}</td>
              <td>{{ $acti->act_des }}</td>
              <td>{{ $acti->act_des_det }}</td>
              <td>{{ $acti->act_fec_adq }}</td>
              <td>{{ $acti->act_estado }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
			</div>
		</tr>
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