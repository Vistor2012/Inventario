@extends('layouts.app')
@push('styles')
<style type="text/css">
  .modal-backdrop{display: none;}
</style>
@endpush
@section('content')
<div>
    <div class="container">
      <div class="row" style="padding-top: 20%;">
        <div class="col-md-offset-2 col-md-8">
          <div class="row">
              <div class="col-xs-12">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-block btn-lg" data-toggle="modal" data-target="#exampleModal"><i class="glyphicon glyphicon-save"></i> Importar Excel</button>
                
              </div>
          </div>
          <hr>
          <div class="row">
              <div class="col-xs-12">
                      <a href="{{ route('oficinas.index') }}">
                        <button type="button" class="btn btn-primary btn-block btn-lg"><i class="glyphicon glyphicon-book"></i> Oficinas e Unidades</button>
                      </a>
              </div>
          </div>
          <hr>
          <div class="row">
              <div class="col-xs-12">
                      <a href="{{ route('inventarios.index') }}">
                        <button type="button" class="btn btn-primary btn-block btn-lg"><i class="glyphicon glyphicon-edit"></i> Realizar Inventario</button>
                      </a>
              </div>
          </div>
        </div>
      </div>
    </div>
</div> 
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Importar Archivos Excel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="input-group">
            <form action="{{ route('import')}}" method="POST" enctype="multipart/form-data">
                <span class="input-group-prepend">
                    {{ csrf_field() }}
                    <input type="file" name="import_file" class="from-control" />
                    <input type="submit" name="Import"class="btn btn-primary" />
                </span>
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>  
@endsection

@push('scripts')
<script>
  $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  })
</script>
@endpush