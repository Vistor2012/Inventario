@extends('layouts.app')
@section('content')

  <div class="box">
    <div class="box-header with-border col-md-12" align="center">
      <h3 class="box-title">Editar Inventario</h3>
    </div>
    <div class="box-body col-md-12" >
      <div class="panel panel-primary" >
        <div class="panel-heading">
          <h3 class="panel-title">Modificar Datos de Inventario</h3>
        </div>
        <div class="panel-body">
          {!! Form::open([ 'route' => ['inventarios.update', $inventario->id_inv], 'method' => 'PUT', 'files' => true]) !!}
    
            <div class="form-group col-md-6">
              {!! form::label('Codigo de la Unidad') !!}
              {!! form::text('inv_ofi_cod', $inventario->inv_ofi_cod, ['class' => 'form-control', 'placeholder' => 'Codigo de la Unidad']) !!}
            </div>
            <div class="form-group col-md-6">
              {!! form::label('Nombre de la Unidad') !!}
              {!! form::text('inv_ofi_des', $inventario->inv_ofi_des, ['class' => 'form-control', 'placeholder' => 'Nombre de la Unidad', 'required']) !!}
            </div>
            <div class="form-group col-md-12">
              {!! form::label('Descripcion del Inventario') !!}
              {!! form::text('inv_des', $inventario->inv_des, ['class' => 'form-control', 'placeholder' => 'Descripcion', 'required']) !!}
            </div>
            <div class="form-group col-md-6">
              {!! form::label('Responsable Actual de la Unidad') !!}
              {!! form::text('inv_resp_actual', $inventario->inv_resp_actual, ['class' => 'form-control', 'placeholder' => 'Responsable Actual de la Unidad', 'required']) !!}
            </div>
            <div class="form-group col-md-6">
              {!! form::label('Nuevo Responsable de la Unidad') !!}
              {!! form::text('inv_resp_nuevo', $inventario->inv_resp_nuevo, ['class' => 'form-control', 'placeholder' => 'Nuevo Responsable de la Unidad']) !!}
            </div>
            <div class="form-group col-md-12">
              {!! form::label('Observacion') !!}
              {!! form::text('obs_inv', $inventario->obs_inv, ['class' => 'form-control', 'placeholder' => 'Observacion']) !!}
            </div>
            <div class="form-group col-md-6">
              {!! form::label('Responsable de Inventario') !!}
              {!! form::text('resp_inv', $inventario->resp_inv, ['class' => 'form-control', 'placeholder' => 'Responsable a Realizar el Inventario']) !!}
            </div>
            <div class="form-group col-md-6">
              {!! form::label('Fecha') !!}
              {!! form::date('fec_inv', $inventario->fec_inv, ['class' => 'form-control', 'placeholder' => 'Fecha']) !!}
            </div>
            <div class="form-group col-md-12">
              {!! form::submit('Editar', ['class' => 'btn btn-primary']) !!}
            </div>
        {!!Form::close()!!}
        </div>
        <div class="panel-footer">Editar Inventario</div>
      </div>
    </div>
  </div>
  <br>
@endsection
