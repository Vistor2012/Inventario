@extends('layouts.app')
@section('content')
<div class="box">
  <div class="box-header with-border">
    <center><h1 class="box-title">Lista de Activos Revalorizados</h1></center>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fa fa-minus"></i></button>
    </div>
    <div class="btn-group" role="group">
        <a href="{{ route('oficinas.index') }}">
            <button type="button" class="btn btn-primary">Oficinas</button>
        </a>
    </div>
  </div>
  <div class="box-body" style="overflow: scroll;">
    <br>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Codigo </th>
          <th>Descripcion</th>
          <th>Descripcion Detallada</th>
          <th>Cantidad</th>
          <th>Estado del Bien</th>

      </thead>
      <tbody>
        @foreach($activorev as $acti)
        <tr>
          <td>{{ $acti->codigo }}</td>
          <td>{{ $acti->act_des }}</td>
          <td>{{ $acti->act_des_det }}</td>
          <td>{{ $acti->act_can }}</td>
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
