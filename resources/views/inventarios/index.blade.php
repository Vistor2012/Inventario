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
      <div class="col-md-6">
        <a href="{{ url('pdfInv') }}/{{ $inventario->inv_ofi_cod }}">
          <button type="button" class="btn btn-primary">Imprimir</button>
        </a>
      </div>
    </div>
  </div>
  <div class="box-body col-md-12">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Codigo Oficina</th>
          <th>Unidad</th>
          <th>Fecha</th>
          <th>Descripcion</th>
          <th>Observacion</th>
          <th>Responsable</th>
          <th>Opciones</th>
        </tr>
      </thead>
      
      <tbody>
        @foreach($inventario as $inv)
        <tr>
          <td>{{ $inv->inv_ofi_cod }}</td>
          <td>{{ $inv->inv_ofi_des }}</td>
          <td>{{ $inv->fec_inv }}</td>
          <td>{{ $inv->inv_des }}</td>
          <td>{{ $inv->obs_inv }}</td>
          <td>{{ $inv->resp_inv }}</td>
          <td>
            <a href="{{ route('inventarios.show', $inv->id_inv) }}">
              <button type="button" class="btn btn-primary">Ver Detalle</button>
            </a>
            <a href="{{ route('inventarios.edit',$inv->id_inv) }}">
                <button type="button" class="btn btn-warning">Modificar</button>
              </a>
              <a href="{{ route('inventarios.destroy', $inv->id_inv) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')">
                <button type="button" class="btn btn-danger">Eliminar</button>
              </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection