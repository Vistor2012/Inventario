@extends('layouts.app')
@section('content')
<div class="box">
    <div class="box-header with-border col-md-12" align="center">
      <h3 class="box-title">Registro de Nuevo Inventario</h3>
    </div>
    <div class="box-body col-md-12" >
      <div class="panel panel-primary" >
        <div class="panel-heading">
          <h3 class="panel-title">Realizar Nuevo Registro de Inventario</h3>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
          $(document).ready(function(){

            $('select#inv_ofi_cod').change(function(){
              $('select#oficina').val($(this).val());
              oficina = $('select#oficina option:selected').text();
              $('input#inv_ofi_des').val(oficina);
            });

            $('select#oficina').change(function(){
              $('select#inv_ofi_cod').val($(this).val());
              oficina = $('select#oficina option:selected').text();
              $('input#inv_ofi_des').val(oficina);
            });
          });
        </script>
        <div class="panel-body">
          {!! Form::open([ 'route' => 'inventarios.store', 'method' => 'POST', 'files' => true,'id' => 'inv_form']) !!}
            <div class="row col-md-12">
              <div class="form-group col-md-4">
                <label>Codigo de la Unidad</label>
                <select class="form-control select2 requerido" name="inv_ofi_cod" id="inv_ofi_cod" value="{{old('inv_ofi_cod')}}">
                  @foreach($oficina as $ofi)
                    <option value="{{$ofi->ofc_cod}}">{{$ofi->ofc_cod}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-6">
                <label>Nombre de la Unidad</label>
                <select class="form-control select2 requerido" name="oficina" id="oficina" value="{{old('oficina')}}">
                  @foreach($oficina as $ofi)
                    <option value="{{$ofi->ofc_cod}}">{{$ofi->ofc_des}}</option>
                  @endforeach
                </select>
              </div>
              <input type="hidden" name="inv_ofi_des" id="inv_ofi_des" value="{{$oficina[0]->ofc_des}}">
              <input id="prodId" name="prodId" type="hidden" value="xm234jq">
            </div>
             <div class="form-group col-md-12">
              {!! form::label('Descripcion del Inventario') !!}
              {!! form::text('inv_des', null, ['class' => 'form-control', 'placeholder' => 'Descripcion', 'required']) !!}
            </div>
            <div class="form-group col-md-6">
              {!! form::label('Responsable Actual de la Unidad') !!}
              {!! form::text('inv_resp_actual', null, ['class' => 'form-control', 'placeholder' => 'Responsable Actual de la Unidad', 'required']) !!}
            </div>
            <div class="form-group col-md-6">
              {!! form::label('Nuevo Responsable de la Unidad') !!}
              {!! form::text('inv_resp_nuevo', null, ['class' => 'form-control', 'placeholder' => 'Nuevo Responsable de la Unidad']) !!}
            </div>
            <div class="form-group col-md-12">
              {!! form::label('Observacion') !!}
              {!! form::text('obs_inv', null, ['class' => 'form-control', 'placeholder' => 'Observacion']) !!}
            </div>
            <div class="form-group col-md-6">
              {!! form::label('Responsable de Inventario') !!}
              {!! form::text('resp_inv', null, ['class' => 'form-control', 'placeholder' => 'Responsable a Realizar el Inventario']) !!}
            </div>
            <div class="form-group col-md-6">
              {!! form::label('Fecha') !!}
              {!! form::date('fec_inv', null, ['class' => 'form-control', 'placeholder' => 'Fecha']) !!}
            </div>
            <div class="form-group col-md-12">
              {!! form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
            </div>
        {!!Form::close()!!}
        </div>
        <div class="panel-footer">Registro de Inventario</div>
      </div>
    </div>
  </div>
  <br>
@endsection
