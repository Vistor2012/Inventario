
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
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" role="tabpanel" id="inventario">
                            <div class="panel-body">
                                <form method='PUT' id='inv_form'>
                                    <div class="form-group col-md-6">
                                        <label>Codigo de la Unidad</label>
                                        <select class="form-control select2 requerido" name="inv_ofi_cod" id="inv_ofi_cod" value="{{old('inv_ofi_cod')}}">
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
                                    <input type="hidden" name="inv_ofi_des" id="inv_ofi_des" value="{{$oficina[0]->ofc_des}}">
                                    <input id="prodId" name="prodId" type="hidden" value="xm234jq">
                                    {{ csrf_field() }}
                                    <div class="form-group col-md-12">
                                        <label>Descripcion del Inventario</label>
                                        <textarea type="text" name='inv_des' id='inv_des' class='form-control rounded-0' placeholder="Descripcion" required></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Responsable Actual de la Unidad</label>
                                        <input type="text" name="inv_resp_actual" id="inv_resp_actual" class="form-control" placeholder="Responsable Actual de la Unidad" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Nuevo Responsable de la Unidad</label>
                                        <input type="text" name="inv_resp_nuevo" id="inv_resp_nuevo" class="form-control" placeholder="Nuevo Responsable de la Unidad" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Observaciones</label>
                                        <textarea type="text" name="obs_inv" id="obs_inv" class="form-control rounded-0" placeholder="Observaciones"></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Responsable de Inventario</label>
                                        <input type="text" name="resp_inv" id="resp_inv" class="form-control" placeholder="Responsable a Realizar el Inventario" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Responsable de la Unidad de Bienes e Inventarios</label>
                                        <input type="text" name="resp_unidad" id="resp_unidad" class="form-control" placeholder="Responsable de la Unidad de Bienes e Inventarios" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Fecha</label>
                                        <input type="date" name="fec_inv" id="fec_inv" class="form-control" required>
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
                    </div>
                </div>
            </section>
        </div>
    </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="exampleModalLabel">Información del Inventario</h5>
      </div>
      <div class="modal-body">
        <form method='POST' id='inv_form'>
          <div class="form-group col-md-6">
              <label>Codigo de la Unidad</label>
              <select class="form-control select2 requerido" name="inv_ofi_cod"
                      id="inv_ofi_cod" value="{{old('inv_ofi_cod')}}">
                  <option value="">Seleccione una Opción</option>
              </select>
          </div>
          <div class="form-group col-md-6">
              <label>Nombre de la Unidad</label>
              <select class="form-control select2 requerido" name="oficina" id="oficina"
                      value="{{old('oficina')}}">
                  <option value="">Seleccione una Opción</option>
              </select>
          </div>
          <input id="prodId" name="prodId" type="hidden" value="xm234jq">
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
                     placeholder="Responsable a Realizar el Inventario" required>
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
  <script type="text/javascript">
    $(document).ready( function () {
      $('#table_id').DataTable({
        language: {
          url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
        }
      });
      getInvInfo(ofi_cod);
    });
    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
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
  </script>
@endpush
