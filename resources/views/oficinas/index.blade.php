@extends('layouts.app')

@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endpush

@section('navbar')
  @include('navbar')
@endsection

@section('content')
<div class="box">
  <div class="box-header with-border row">
    <center><h1 class="box-title">Lista de Oficinas</h1></center>
    <br>
      <div class="col-md-10 col-xs-offset-1">
        <form action="/search" method="get" >
          <div class="row">
            <div class="col-xs-3 col-xs-offset-6">
              <button data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-import"></i> Importar Excel</button>
            </div>
            <div class="col-xs-3">
              <a href="{{asset('Plantilla.xlsx')}}" class="btn btn-success btn-block"><i class="glyphicon glyphicon-download"></i> Descargar Plantilla</a>
            </div>
          </div>
        </form>
      </div>
  </div>
  <br>
  <br>
  <div class="row">
    <div class="box-body col-md-10 col-xs-offset-1">
      <table id="table_id" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Codigo Oficina</th>
            <th>Descripcion</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($oficina as $ofi)
          <tr>
            <td>{{ $ofi->ofc_cod }}</td>
            <td>{{ $ofi->ofc_des }}</td>
            <td class="text-center">
              <a href="{{ route('oficinas.show', $ofi->ofc_cod) }}">
                <button type="button" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i> Ver Activos</button>
              </a>
              <a href="{{ route('pdf', ['ofc_cod' => $ofi->ofc_cod])}}">
                <button type="button" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-download"></i> Descargar</button>
              </a>
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
        <h5 class="modal-title text-center" id="exampleModalLabel">Importar Archivos Excel</h5>
      </div>
      <div class="modal-body">
        <div class="input-group">
          <form action="{{ route('import')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" name="import_file" class="from-control" />
            <br>
            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-upload"></i> Importar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>  
@endsection

@push('scripts')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script>
  $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  });

  $(document).ready( function () {
    $('#table_id').DataTable({
      language: {
        url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
      }
    });
  });
</script>
@endpush



