@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        .table td, th{
            border: black solid 0.1px !important;
        }
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
            width: 50%;
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
                        <div class="tab-pane active" role="tabpanel" id="detalle">
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
                                    @php $activos_revi = $data[0]; @endphp
                                    @foreach($activos_revi as $activo)
                                        <tr id="tr{{$loop->iteration}}" style="background-color: lightpink;">
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" disabled id="exi_act{{$loop->iteration}}" class="custom-control-input" checkbox>
                                                    <label class="custom-control-label" for=""></label>
                                                </div>
                                            </td>
                                            <td>{{$activo['codigo']}}</td>
                                            <td>{{$activo['act_des']}}</td>
                                            <td>{{$activo['act_can']}}</td>
                                            <td class="text-center">
                                                <select id="act_estado{{$loop->iteration}}" disabled class="form-control">
                                                    <option value=""></option>
                                                    <option value="Bueno">Bueno</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="deteriorado">Deteriorado</option>
                                                    <option value="fuera de uso">Fuera de Uso</option>
                                                </select>
                                            </td>
                                            <td>{{$activo['act_imp_bs']}}</td>
                                            <td class="text-center">
                                                <div class="form-group col-md-12">
                                                    <textarea type="text" disabled id="observacion{{$loop->iteration}}" class="form-control rounded-0" rows="1" placeholder="Observacion"></textarea>
                                                </div>
                                            </td>
                                            <td class="text-center"><form onsubmit="return storeInv({{$activo['codigo']}}, {{$loop->iteration}});"><button id="button$" disabled type="submit" class="btn btn-default"><span class="glyphicon glyphicon-check"></span> Guardar</button></form></td>
                                        </tr>
                                    @endforeach
                                    @php $activos_sin_revi = $data[1]; @endphp
                                    @foreach($activos_sin_revi as $activo)
                                        <tr id="tr{{$loop->iteration}}" style="background-color: palegreen;">
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" id="exi_act{{$loop->iteration}}" class="custom-control-input" checkbox>
                                                    <label class="custom-control-label" for=""></label>
                                                </div>
                                            </td>
                                            <td>{{$activo['codigo']}}</td>
                                            <td>{{$activo['act_des']}}</td>
                                            <td>{{$activo['act_can']}}</td>
                                            <td class="text-center">
                                                <select id="act_estado{{$loop->iteration}}" class="form-control">
                                                    <option value=""></option>
                                                    <option value="Bueno">Bueno</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="deteriorado">Deteriorado</option>
                                                    <option value="fuera de uso">Fuera de Uso</option>
                                                </select>
                                            </td>
                                            <td>{{$activo['act_imp_bs']}}</td>
                                            <td class="text-center">
                                                <div class="form-group col-md-12">
                                                    <textarea type="text" id="observacion{{$loop->iteration}}" class="form-control rounded-0" rows="1" placeholder="Observacion"></textarea>
                                                </div>
                                            </td>
                                            <td class="text-center"><form onsubmit="return storeInv('{{$activo['codigo']}}', {{$loop->iteration}});"><button id="button{{$loop->iteration}}" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Guardar</button></form></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <ul class="list-inline pull-right">
                                <li>
                                    <button type="button" class="btn btn-default prev-step">Anterior</button>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-primary next-step">Guardar Y Continuar</button>
                                </li>
                            </ul>
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
@endsection

@push('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script>

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
            $('#table-detalle').DataTable({
                language: {
                    url: 'http://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
                }
            });
        });

        function storeInv(codigo, j) {
            data = [
                {name: 'codigo', value: codigo},
                {name: 'exi_act', value: $('input#exi_act'+j).prop('checked')},
                {name: 'act_estado', value: $('select#act_estado'+j).val()},
                {name: 'observacion', value: $('textarea#observacion'+j).val()},
                {name: 'id_inv', value: {{$data[2]}} }
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
                success:function(msg){
                    console.log(msg);
                    $(button).removeClass('btn-success');
                    $(button).html('<span class="glyphicon glyphicon-check"></span> Guardado')
                },
                fail:function () {
                    $(button).removeClass('btn-success');
                    $(button).addClass('btn-danger')
                    $(button).html('<span class="glyphicon glyphicon-remove"></span> Error')
                }
            });
            $('tr#tr'+j).css('background-color','lightpink');
            return false;
        }
    </script>
@endpush
