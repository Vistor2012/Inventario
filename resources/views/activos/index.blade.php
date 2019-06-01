@extends('layouts.app')

@section('navbar')
  @include('navbar')
@endsection

@section('content')
<div class="box">
  <div class="box-header with-border">
    <center><h1 class="box-title">Lista de Activos</h1></center>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fa fa-minus"></i></button>
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
          <th>Codigo de Partida</th>

      </thead>
      <tbody>
        @foreach($activo as $act)
        <tr>
          <td>{{ $act->codigo }}</td>
          <td>{{ $act->act_des }}</td>
          <td>{{ $act->act_des_det }}</td>
          <td>{{ $act->act_can }}</td>
          <td>{{ $act->act_par_cod }}</td>
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
