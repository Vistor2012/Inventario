@extends('layouts.app')

@push('styles')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endpush

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <center><h1 class="box-title">Inventarios</h1></center>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-offset-8 col-md-3">
      <div class="">
        <a href="{{ Route('inventarios.create') }}">
          <button type="button" class="btn btn-success btn-block"><i class="glyphicon glyphicon-plus-sign"></i> Registrar Nuevo Inventario</button>
        </a>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <table id="table_id" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th style="width: 3%;" class="text-center">Codigo Oficina</th>
          <th style="width: 12%;" class="text-center">Unidad</th>
          <th style="width: 10%;" class="text-center">Fecha</th>
          <th style="width: 25%;" class="text-center">Descripcion</th>
          <th style="width: 20%;" class="text-center">Observacion</th>
          <th style="width: 10%;" class="text-center">Responsable - Estado</th>
          <th style="width: 20%;" class="text-center">Opciones</th>
        </tr>
        </thead>

        <tbody>
        @foreach($inventario as $inv)
          <tr>
            <td class="text-center">{{ $inv->inv_ofi_cod }}</td>
            <td class="text-center">{{ $inv->inv_ofi_des }}</td>
            <td class="text-center">{{ $inv->fec_inv }}</td>
            <td class="text-center">{{ $inv->inv_des }}</td>
            <td class="text-center">{{ $inv->obs_inv }}</td>
            <td class="text-center">{{ $inv->resp_inv }} - {{($inv->estado) ? 'TERMINADO' : 'PENDIENTE'}}</td>
            <td class="text-center">
              <div class="btn-group" role="group">
                @if($inv->estado)
                  <a href="{{ route('inventarios.show', $inv->id_inv) }}" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Ver Detalle</a>
                  <a href="{{ route('pdfInv', ['inv_ofi_cod' => $inv->inv_ofi_cod])}}" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-download"></i> Descargar</a>
                @else
                  <a href="{{ route('continuar', ['id_inv' => $inv->id_inv, 'inv_ofi_cod' =>$inv->inv_ofi_cod])}}" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Continuar</a>
                  <a href="{{ route('inventarios.destroy', $inv->id_inv) }}" onclick="return  confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Eliminar</a>
                @endif
              </div>
            </td>
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
          url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
        }
      });
    });
  </script>
@endpush