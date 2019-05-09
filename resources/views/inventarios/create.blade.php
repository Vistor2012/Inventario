@extends('layouts.app')
@section('content')

<link rel="stylesheet"  type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"  id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
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

<div class="container">
  <div class="row">
    <section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="inventario" role="tab" title="inventario">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#detalle" data-toggle="tab" aria-controls="detalle" role="tab" title="detalle">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#completo" data-toggle="tab" aria-controls="completo" role="tab" title="Completo">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
            <form role="form">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="inventario">
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
                          <ul class="list-inline pull-right">
                            <div class="form-group col-md-12">

                              {!! form::submit('Guardar y Continuar', ['class' => 'btn btn-primary next-stepp']) !!}
                            </div>
                          </ul>
                        {!!Form::close()!!}
                        </div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="detalle">
                        <h3 align="center">Detalle de Activos Fijos</h3>
                        <div>
                            <table id="detalles">
                              <thead>
                                <tr>
                                  <th>Codigo</th>
                                  <th>Descripcion</th>
                                  <th>Cantidad</th>
                                  <th>Estado</th>
                                  <th>Valor Neto</th>
                                  <th>Verificacion</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  
                                </tr>
                              </tbody>
                            </table>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Anterior</button></li>
                            <li><button type="button" class="btn btn-primary next-step">Guardar Y Continuar</button></li>
                        </ul>
                        <script>
                          $(document).ready(function() {
                            $('#detalles').DataTable();
                          });
                        </script>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="completo">
                        <h3>Completado</h3>
                        <p>Se ha realizado satisfactoriamente el inventario.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </section>
   </div>
</div>
<script type="text/javascript">
    $(function(){
        $('#detalle').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{url(Inventario.create)}}' + '/' +inv_ofi_cod
            columns: [
                { data: 'act_codigo', name: 'act_codigo' },
                { data: 'act_des', name: 'act_des' },
                { data: 'act_des_det', name: 'act_des_det' },
                { data: 'act_can', name: 'act_can' },
                { data: 'act_estado', name: 'act_estado' },
                { data: 'act_ofc_cod', name: 'act_ofc_cod' },
                { data: 'act_val_neto', name: 'act_val_neto' },
                { data: 'exi_act', name: 'exi_act' }                                                    
            ]
        });
    });
</script>
<script type="text/javascript">
  let flag = true;
  $(document).ready(function () {
      //Initialize tooltips
      $('.nav-tabs > li a[title]').tooltip();
      
      //Wizard
      $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
          var $target = $(e.target);
          if ($target.parent().hasClass('disabled')) {
              return false;
          }
      });
      $(".next-step").click(function (e) {
          var $active = $('.wizard .nav-tabs li.active');
          $active.next().removeClass('disabled');
          nextTab($active);
          if(flag){
            $.ajax({
              url:
            });
            flag=false;
          }
      });
      
      $(".prev-step").click(function (e) {
          var $active = $('.wizard .nav-tabs li.active');
          prevTab($active);
      });

      
  });
  function nextTab(elem) {
      $(elem).next().find('a[data-toggle="tab"]').click();
  }
  function prevTab(elem) {
      $(elem).prev().find('a[data-toggle="tab"]').click();
  }
</script>

@endsection
