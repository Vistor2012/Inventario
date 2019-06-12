@extends('layouts.app')

@push('styles')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endpush

@section('navbar')
    @include('navbar')
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <center><h1 class="box-title">Inventarios</h1></center>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-offset-8 col-md-3">
      <div class="">

        <a href="{{ Route('inventarios.create') }}">
          <button type="button" class="btn btn-success btn-block"><i class="glyphicon glyphicon-plus-sign"></i> Registrar Nuevo Inventario</button>
        </a>
      </div>
    </div>
  </div>
   <br>
  <div class="row"> 
    <div class="col-md-10 col-md-offset-1">
      <table id="table_id" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th style="width: 3%;" class="text-center">Codigo Oficina</th>
          <th style="width: 12%;" class="text-center">Unidad</th>
          <th style="width: 10%;" class="text-center">Fecha</th>
          <th style="width: 25%;" class="text-center">Descripcion</th>
          <th style="width: 20%;" class="text-center">Observacion</th>
          <th style="width: 10%;" class="text-center">Responsable - Estado</th>
          <th style="width: 20%;" class="text-center">Opciones</th>
        </tr>
        </thead>

        <tbody>
        @foreach($inventario as $inv)
          <tr>
            <td class="text-center">{{ $inv->inv_ofi_cod }}</td>
            <td class="text-center">{{ $inv->inv_ofi_des }}</td>
            <td class="text-center">{{ $inv->fec_inv }}</td>
            <td class="text-center">{{ $inv->inv_des }}</td>
            <td class="text-center">{{ $inv->obs_inv }}</td>
            <td class="text-center">{{ $inv->resp_inv }} - {{($inv->estado) ? 'TERMINADO' : 'PENDIENTE'}}</td>
            <td class="text-center">
              <div class="btn-group" role="group">
                @if($inv->estado)
                  <a href="{{ route('invdetalles.show', ['id_inv' => $inv->id_inv])}}" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Ver Detalle</a>
                  <a href="{{ route('pdfInv', ['inv_ofi_cod' => $inv->inv_ofi_cod])}}" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-download"></i> Descargar</a>
                  <br>
                  <a data-toggle="modal" onclick="getInvInfo({{$inv->id_inv}})" data-target="#exampleModal" type="button" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-info-sign"></i> Info</a>
                @else
                  <a href="{{ route('continuar', ['id_inv' => $inv->id_inv, 'inv_ofi_cod' =>$inv->inv_ofi_cod])}}" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Continuar</a>
                  <!--<a href="{{ route('inventarios.destroy', $inv->id_inv) }}" onclick="return  confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Eliminar</a>-->
                  <br>
                  <a href="{{ route('pdfInv', ['inv_ofi_cod' => $inv->inv_ofi_cod])}}" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-download"></i> Vista Preliminar</a>
                @endif
              </div>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
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
              <input type="text" name='inv_ofi_cod' id='inv_ofi_cod' class='form-control' placeholder="Codigo de la Unidad" required></input>
          </div>
          <div class="form-group col-md-6">
              <label>Nombre de la Unidad</label>
              <input type="text" name='inv_ofi_des' id='inv_ofi_des' class='form-control' placeholder="Codigo de la Unidad" required></input>
          </div>
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
                        $('input#inv_ofi_cod').val(data[0].inv_ofi_cod);
                        $('input#inv_ofi_des').val(data[0].inv_ofi_des);
                        $('textarea#inv_des').html(data[0].inv_des);
                        $('input#inv_resp_actual').val(data[0].inv_resp_actual);
                        $('input#inv_resp_nuevo').val(data[0].inv_resp_nuevo);
                        $('input#obs_inv').val(data[0].obs_inv);
                        $('input#resp_inv').val(data[0].resp_inv);
                        $('input#resp_unidad').val(data[0].resp_unidad);
                        $('input#fec_inv').val(data[0].fec_inv);
                        $('input#gestion').val(data[0].gestion);
                    } else {
                        $('input#inv_ofi_cod').val('');
                        $('input#inv_ofi_des').val('');
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