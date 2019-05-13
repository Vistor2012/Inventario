@extends('layouts.app')
@section('content')

@push('styles')
    <link rel="stylesheet"  type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"  id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
    <style>
        .wizard {
            margin: 20px auto;
            background: #fff;
        }
        .wizard .nav-tabs {
            position: relative;
            margin: 40px auto;
            margin-bottom: 0;
            border-bottom-color: #e0e0e0;
        }
        .wizard > div.wizard-inner {
            position: relative;
        }
        .connecting-line {
            height: 2px;
            background: #e0e0e0;
            position: absolute;
            width: 80%;
            margin: 0 auto;
            left: 0;
            right: 0;
            top: 50%;
            z-index: 1;
        }
        .wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
            color: #555555;
            cursor: default;
            border: 0;
            border-bottom-color: transparent;
        }
        span.round-tab {
            width: 70px;
            height: 70px;
            line-height: 70px;
            display: inline-block;
            border-radius: 100px;
            background: #fff;
            border: 2px solid #e0e0e0;
            z-index: 2;
            position: absolute;
            left: 0;
            text-align: center;
            font-size: 25px;
        }
        span.round-tab i{
            color:#555555;
        }
        .wizard li.active span.round-tab {
            background: #fff;
            border: 2px solid #5bc0de;
        }
        .wizard li.active span.round-tab i{
            color: #5bc0de;
        }
        span.round-tab:hover {
            color: #333;
            border: 2px solid #333;
        }
        .wizard .nav-tabs > li {
            width: 33.3%;
        }
        .wizard li:after {
            content: " ";
            position: absolute;
            left: 46%;
            opacity: 0;
            margin: 0 auto;
            bottom: 0px;
            border: 5px solid transparent;
            border-bottom-color: #5bc0de;
            transition: 0.1s ease-in-out;
        }
        .wizard li.active:after {
            content: " ";
            position: absolute;
            left: 46%;
            opacity: 1;
            margin: 0 auto;
            bottom: 0px;
            border: 10px solid transparent;
            border-bottom-color: #5bc0de;
        }
        .wizard .nav-tabs > li a {
            width: 70px;
            height: 70px;
            margin: 20px auto;
            border-radius: 100%;
            padding: 0;
        }
        .wizard .nav-tabs > li a:hover {
            background: transparent;
        }
        .wizard .tab-pane {
            position: relative;
            padding-top: 50px;
        }
        .wizard h3 {
            margin-top: 0;
        }
        @media( max-width : 585px ) {
            .wizard {
                width: 90%;
                height: auto !important;
            }
            span.round-tab {
                font-size: 16px;
                width: 50px;
                height: 50px;
                line-height: 50px;
            }
            .wizard .nav-tabs > li a {
                width: 50px;
                height: 50px;
                line-height: 50px;
            }
            .wizard li.active:after {
                content: " ";
                position: absolute;
                left: 35%;
            }
        }
    </style>
@endpush
<!------ Include the above in your HEAD tag ---------->

<div class="container">
  <div class="row">
    <section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#inventario" data-toggle="tab" aria-controls="inventario" role="tab" title="inventario">
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
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="inventario">
                      <div class="panel-body">
                      <form method='POST' id='inv_form'>
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
                          {{ csrf_field() }}
                          <div class="form-group col-md-12">
                             <label>Descripcion del Inventario</label>
                              <input name='inv_des' class='form-control' placeholder="Descripcion" required>
                          </div>
                          <div class="form-group col-md-6">
                              <label for="">Responsable Actual de la Unidad</label>
                              <input type="text" name="inv_resp_actual" class="form-control" placeholder="Responsable Actual de la Unidad" required>
                          </div>
                          <div class="form-group col-md-6">
                              <label for="">Nuevo Responsable de la Unidad</label>
                              <input type="text" name="inv_resp_nuevo" class="form-control" placeholder="Nuevo Responsable de la Unidad" required>
                          </div>
                          <div class="form-group col-md-12">
                              <label for="">Observaciones</label>
                              <input type="text" name="inv_obs" class="form-control" placeholder="Observaciones">
                          </div>
                          <div class="form-group col-md-6">
                              <label for="">Responsable de Inventario</label>
                              <input type="text" name="resp_inv" class="form-control" placeholder="Responsable a Realizar el Inventario" required>
                          </div>
                          <div class="form-group col-md-6">
                              <label for="">Fecha</label>
                              <input type="date" name="fec_inv" class="form-control" required>
                          </div>
                          <ul class="list-inline pull-right">
                            <div class="form-group col-md-12">
                              <button type="submit" class="btn btn-primary next-step">Guardar y Continuar</button>
                            </div>
                          </ul>
                      </form>
                        </div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="detalle">
                        <h3 align="center">Detalle de Activos Fijos</h3>
                        <div>
                            <table id="table-detalle" class="table table-striped table-bordered">
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
                              <tbody id="table_content">
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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
        </div>
    </section>
   </div>
</div>

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        let flag = true;
        //FIRST FORM
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
        //Initialize tooltips
        $('.nav-tabs > li a[title]').tooltip();
        //Wizard
        function nextTab(elem) {
            $(elem).next().find('a[data-toggle="tab"]').click();
        }
        function prevTab(elem) {
            $(elem).prev().find('a[data-toggle="tab"]').click();
        }
        //DATATABLES
        $(document).ready(function(){
            $('#table-detalle').DataTable({});
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
            });
            $(".prev-step").click(function (e) {
                var $active = $('.wizard .nav-tabs li.active');
                prevTab($active);
            });
        })
        $('form#inv_form').submit(function(e){
           e.preventDefault();
           let datos = $(this).serializeArray();
           let html = '';
           $.ajax({
               url:'{{route('inventarios.store')}}',
               method:'post',
               dataType:'JSON',
               data: datos,
               success: function (data) {
                    for(let i = 0; i < data.length; i++ ){
                        html +=
                        `<tr>
                            <td>${data[i].codigo}</td>
                            <td>${data[i].act_des}</td>
                            <td>${data[i].act_can}</td>
                            <td>
                                <select class="form-control">
                                    <option value="1">Bueno</option>
                                    <option value="2">Regular</option>
                                    <option value="3">Malo</option>
                                </select>
                            </td>
                            <td>100</td>
                            <td><button class="btn btn-success btn-xs" id="${data[i].codigo}" onclick="guardar_act(this)"><span class="glyphicon glyphicon-save"></span> Guardar</button</td>
                        <tr>`
                    }
                    $('#table_content').html(html);
               }
           })
        });
        function guardar_act(button){
            id = button.id;
            $.ajax({
                url: '{{url('invenDetalle.store')}}',
                data: {id_activo: id},
                method: 'POST',
                success:function(){
                    $(button).removeClass('btn-success');
                    $(button).html('<span class="glyphicon glyphicon-check"></span> Guardado')
                },
                fail:function () {
                    $(button).removeClass('btn-success');
                    $(button).addClass('btn-danger')
                    $(button).html('<span class="glyphicon glyphicon-remove"></span> Error')
                }
            })
        }
    </script>
@endpush
@endsection