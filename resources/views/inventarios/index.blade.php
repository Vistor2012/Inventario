@extends('layouts.app')
@section('content')
<div class="box">
  <div class="box-header with-border col-md-12">
    <center><h1 class="box-title">Inventarios</h1></center>
    <div class="box-body">
      <div class="col-md-6">
        <a href="{{ Route('inventarios.create') }}">
          <button type="button" class="btn btn-primary btn-lg">Registrar Nuevo Inventario</button>
        </a>
      </div>
    </div>
  </div>
  <div class="box-body col-md-12">
    <table id="example1" class="table table-bordered table-striped">
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
              <a href="{{ route('inventarios.show', $inv->id_inv) }}" class="btn btn-primary btn-xs">Ver Detalle</a>
              <a href="{{ route('pdfInv', ['inv_ofi_cod' => $inv->inv_ofi_cod])}}" class="btn btn-default btn-xs">Descargar</a>
              @else
              <a href="{{ route('continuar', ['id_inv' => $inv->id_inv, 'inv_ofi_cod' =>$inv->inv_ofi_cod])}}" class="btn btn-success btn-xs">Continuar</a>
              <a href="{{ route('inventarios.destroy', $inv->id_inv) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger btn-xs">Eliminar</a>
              @endif
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection