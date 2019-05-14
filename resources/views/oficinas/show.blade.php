@extends('layouts.app')
@section('content')
<title>Activos</title>
	<div class="col-md-12 col-lg-12">
	 	<th><center><h1 class="box-title">ACTIVOS DE {{$ofi->ofc_des}}</h1></center></th>
		<tr>
      <div class="card body">
        <a href="{{ url('pdf') }}/{{ $ofi->ofc_cod }}">
          <button type="button" class="btn btn-primary">Imprimir</button>
        </a>
      </div>

			<div class="form-row">
        <table id="example1" class="table table-bordered table-striped">
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
              $activo=App\Activo::where('act_ofc_cod','=',$ofi->ofc_cod)->get();
            ?>
            @foreach($activo as $act)
            <tr>
              <td>{{ $act->codigo }}</td>
              <td>{{ $act->act_can }}</td>
              <td>{{ $act->act_des }}</td>
              <td>{{ $act->act_des_det }}</td>
              <td>{{ $act->act_fec_adq }}</td>
              <td>{{ $act->act_estado }}</td>
              <td>
                  <a class="btn btn-success btn-xs" data-toggle="modal" href='#modal-VerQR' onclick="generarQR({{$ofi->ofc_cod}},{{$act->id_act}})">Ver QR</a>
              </td>
            </tr>
            @endforeach
            <?php
              $activorev=App\Activorev::where('act_ofc_cod','=',$ofi->ofc_cod)->get();
            ?>
            @foreach($activorev as $acti)
            <tr>
              <td>{{ $acti->codigo }}</td>
              <td>{{ $acti->act_can }}</td>
              <td>{{ $acti->act_des }}</td>
              <td>{{ $acti->act_des_det }}</td>
              <td>{{ $acti->act_fec_adq }}</td>
              <td>{{ $acti->act_estado }}</td>
              <td>
                  <a class="btn btn-success btn-xs" data-toggle="modal" href='#modal-VerQR' onclick="generarQRC( {{$ofi->ofc_cod}}, {{$acti->id_act}})">Ver QR</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
			</div>
		</tr>
	</div>
<script type="text/javascript">
function generarQR($idOfc , $idAct)
{
        var route = "{{url('generarQR')}}/"+$idOfc + "/" + $idAct;
        $.get(route, function(data){
          console.log(data);
           $asset = '{{ asset('') }}';
           $("#image-QR").attr("src", $asset + 'imagenes/qr/' + data);
        });
}
</script>
<script type="text/javascript">
function generarQRC($idOfi , $idActi)
{
        var route = "{{url('generarQRC')}}/"+$idOfi + "/" + $idActi;
        $.get(route, function(data){
          console.log(data);
           $asset = '{{ asset('') }}';
           $("#image-QR").attr("src", $asset + 'imagenes/qr/' + data);
        });
}
</script>
@include('oficinas.modal-qr')
@include('oficinas.modal-qrc')
@endsection
