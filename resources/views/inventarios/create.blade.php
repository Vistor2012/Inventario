@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        .wizard {
            margin: 5px auto;
            background: #fff;
        }

        .wizard .nav-tabs {
            position: relative;
            margin: 10px auto;
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

        .wizard .nav-tabs > li.active > a,
        .wizard .nav-tabs > li.active > a:hover,
        .wizard .nav-tabs > li.active > a:focus {
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

        span.round-tab i {
            color: #555555;
        }

        .wizard li.active span.round-tab {
            background: #fff;
            border: 2px solid #5bc0de;
        }

        .wizard li.active span.round-tab i {
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

        @media ( max-width: 585px ) {
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

@section('navbar')
    @include('navbar')
@endsection

<!------ Include the above in your HEAD tag ---------->
@section('content')
    <div style="width: 100%; padding-left: 100px; padding-right: 100px;">
        <div class="row">
            <section>
                <div class="wizard">
                    <div class="wizard-inner">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#inventario" data-toggle="tab" aria-controls="inventario" role="tab"
                                   title="inventario">
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
                                <a href="#completo" data-toggle="tab" aria-controls="completo" role="tab"
                                   title="Completo">
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
                                    <div class="form-group col-md-6">
                                        <label>Codigo de la Unidad</label>
                                        <select class="form-control select2 requerido" name="inv_ofi_cod"
                                                id="inv_ofi_cod" value="{{old('inv_ofi_cod')}}">
                                            <option value="">Seleccione una Opción</option>
                                            @foreach($oficina as $ofi)
                                                <option value="{{$ofi->ofc_cod}}">{{$ofi->ofc_cod}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Nombre de la Unidad</label>
                                        <select class="form-control select2 requerido" name="oficina" id="oficina"
                                                value="{{old('oficina')}}">
                                            <option value="">Seleccione una Opción</option>
                                            @foreach($oficina as $ofi)
                                                <option value="{{$ofi->ofc_cod}}">{{$ofi->ofc_des}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" name="inv_ofi_des" id="inv_ofi_des"
                                           value="{{$oficina[0]->ofc_des}}">
                                    <input id="prodId" name="prodId" type="hidden" value="xm234jq">
                                    {{ csrf_field() }}
                                    <div class="form-group col-md-12">
                                        <label>Descripcion del Inventario</label>
                                        <textarea type="text" name='inv_des' id='inv_des' class='form-control rounded-0' placeholder="Descripcion" required></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Responsable Actual de la Unidad</label>
                                        <input type="text" name="inv_resp_actual" id="inv_resp_actual"
                                               class="form-control" placeholder="Responsable Actual de la Unidad"
                                               required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Nuevo Responsable de la Unidad</label>
                                        <input type="text" name="inv_resp_nuevo" id="inv_resp_nuevo"
                                               class="form-control" placeholder="Nuevo Responsable de la Unidad"
                                               required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Observaciones</label>
                                        <textarea type="text" name="obs_inv" id="obs_inv" class="form-control rounded-0" placeholder="Observaciones"></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Responsable de Inventario</label>
                                        <input type="text" name="resp_inv" id="resp_inv" class="form-control"
                                               placeholder="Responsable a Realizar el Inventario" required readonly value="{{Auth::user()->nombres}} {{Auth::user()->paterno}} {{Auth::user()->materno}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Responsable de la Unidad de Bienes e Inventarios</label>
                                        <input type="text" name="resp_unidad" id="resp_unidad" class="form-control"
                                               placeholder="Responsable de la Unidad de Bienes e Inventarios" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Fecha</label>
                                        <input type="date" name="fec_inv" id="fec_inv" class="form-control"
                                               required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Gestión</label>
                                        <input type="text" name="gestion" id="gestion" class="form-control" required>
                                    </div>
                                    <br>
                                    <div class="col-md-offset-6 col-md-6">
                                        <ul class="list-inline pull-right">
                                            <div class="form-group col-md-6">
                                                <button type="submit" class="btn btn-primary next-step">Guardar y
                                                    Continuar
                                                </button>
                                            </div>
                                        </ul>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="detalle">
                            <h3 align="center">Detalle de Activos Fijos</h3>
                            <div>
                                <table id="table-detalle" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 1%;">Verificar</th>
                                        <th style="width: 5%;">Codigo</th>
                                        <th style="width: 30%;">Descripcion</th>
                                        <th style="width: 5%;">Cantidad</th>
                                        <th style="width: 9%;">Estado</th>
                                        <th style="width: 10%;">Valor Neto</th>
                                        <th style="width: 20%;">Observacion</th>
                                        <th style="width: 20%;">Opciones</th>
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
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <ul class="list-inline pull-right">
                                <li>
                                    <button type="button" class="btn btn-default prev-step">Anterior</button>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-primary next-step">Continuar</button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="completo">
                            <h3>Completado</h3>
                            <p>Se ha realizado satisfactoriamente el inventario.</p>
                            <form id="cerrar_inv">
                                <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-save"></i> Cerrar Inventario</button>
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script>
        let flag = true;
        let inv_id;
        //FIRST FORM
        $('select#inv_ofi_cod').change(function () {
            $('select#oficina').val($(this).val());
            oficina = $('select#oficina option:selected').text();
            $('input#inv_ofi_des').val(oficina);
            getInvInfo($(this).val());
        });

        $('select#oficina').change(function () {
            $('select#inv_ofi_cod').val($(this).val());
            oficina = $('select#oficina option:selected').text();
            $('input#inv_ofi_des').val(oficina);
            getInvInfo($(this).val());
        });

        function getInvInfo(id_ofi) {
            $.ajax({
                url: '{{url('getInvInfo')}}' + '/' + id_ofi,
                type: 'GET',
                dataType: 'JSON',
                success: function (data) {
                    if (data.length) {
                        $('textarea#inv_des').html(data[0].inv_des);
                        $('input#inv_resp_actual').val(data[0].inv_resp_actual);
                        $('input#inv_resp_nuevo').val(data[0].inv_resp_nuevo);
                        $('input#obs_inv').val(data[0].obs_inv);
                        $('input#resp_inv').val(data[0].resp_inv);
                        $('input#resp_unidad').val(data[0].resp_unidad);
                        $('input#fec_inv').val(data[0].fec_inv);
                        $('input#gestion').val(data[0].gestion);
                    } else {
                        $('textarea#inv_des').html('');
                        $('input#inv_resp_actual').val('');
                        $('input#inv_resp_nuevo').val('');
                        $('input#obs_inv').val('');
                        $('input#resp_inv').val('');
                        $('input#resp_unidad').val('');
                        $('input#fec_inv').val('');
                        $('input#gestion').val('');
                    }
                },
                fail: function () {
                    console.log('error');
                }
            });
        }

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
        $(document).ready(function () {

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
        $('form#inv_form').submit(function (e) {
            e.preventDefault();
            let datos = $(this).serializeArray();
            let html = '';
            $.ajax({
                url: '{{route('inventarios.store')}}',
                method: 'post',
                dataType: 'JSON',
                data: datos,
                success: function (datos) {
                    data = datos[1];
                    inv_id = datos[0];
                    for (let i = 0; i < data.length; i++) {
                        html +=
                                `<tr id="tr${i}">
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" id="exi_act${i}" class="custom-control-input" checkbox>
                                            <label class="custom-control-label" for=""></label>
                                        </div>
                                    </td>
                                    <td class="text-center">${data[i].codigo}</td>
                                    <td class="text-center">${data[i].act_des}</td>
                                    <td class="text-center">${data[i].act_can}</td>
                                    <td class="text-center">
                                        <select id="act_estado${i}" class="form-control">
                                            <option value=""></option>
                                            <option value="Bueno">Bueno</option>
                                            <option value="Regular">Regular</option>
                                            <option value="deteriorado">Deteriorado</option>
                                            <option value="fuera de uso">Fuera de Uso</option>
                                        </select>
                                    </td>
                                    <td class="text-center">${typeof(data[i].act_imp_bs) != 'undefined' ? data[i].act_imp_bs: '1.00'}</td>
                                    <td class="text-center">
                                        <div class="form-group col-md-12">
                                            <textarea type="text" id="observacion${i}" class="form-control rounded-0" rows="1" placeholder="Observacion"></textarea>
                                        </div>
                                    </td>
                                    <td class="text-center"><form onsubmit="return storeInv('${data[i].codigo}', ${i});"><button id="button${i}" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Guardar</button></form></td>
                                </tr>`;
                    }
                    $('#table_content').html(html);
                    $('#table-detalle').DataTable({
                        language: {
                            url: 'http://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
                        }
                    });
                }
            })
        });

        function storeInv(codigo, j) {
            data = [
                {name: 'codigo', value: codigo},
                {name: 'exi_act', value: $('input#exi_act'+j).prop('checked')},
                {name: 'act_estado', value: $('select#act_estado'+j).val()},
                {name: 'observacion', value: $('textarea#observacion'+j).val()},
                {name: 'id_inv', value: inv_id}
            ];
            let button = $('button#button'+j);
            /*console.log(data);*/
            $.ajax({
                url: '{{url('invdetalles')}}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: data,
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
            $('tr#tr'+j).css('background-color','lightpink');
            return false;
        }
        $('form#cerrar_inv').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: '{{url('cerrar_inv')}}',
                dataType:'JSON',
                data: [{name: 'id_inv', value: inv_id}],
                success: function(data){
                    console.log('guardado')
                    window.location.href = "/";
                },
                fail: function(){
                    console.log('error');
                }
            })
        })
    </script>
@endpush



