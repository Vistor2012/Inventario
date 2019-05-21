@extends('layouts.app')
@section('content')
<div>
    <div class="container">
      <div class="row">
          <div class="btn-group" role="group" aria-label="Basic example">
              <div class="btn-group" role="group">
                  <td>
                      <!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-success openBtn">Importar Archivos Excel</button>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                      <div class="modal-dialog">
                          <!-- Modal content-->
                          <div class="modal-content">
                              <div class="panel-body">
                                <div class="modal-header">
                                  <h4 class="modal-title">Seleccionar Excel</h4>
                                  <div class="form-group">
                                    <a href="{{ url('pdf') }}/{{ $ofi->ofc_cod }}">
                                      <button type="button" class="btn btn-primary">Imprimir</button> 
                                    </a>
                                  </div>
                                </div>
                                <div class="modal-body">
                                    <h4 class="modal-title">Importar Excel</h4>
                                </div>
                                <div class="form-group">   
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <script>
                      $('.openBtn').on('click',function(){
                          $('.modal-body').load('content.html',function(){
                              $('#myModal').modal({show:true});
                          });
                      });
                      </script>
                  </td>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="btn-group" role="group" aria-label="Basic example">
              <div class="btn-group" role="group">
                  <a href="{{ route('oficinas.index') }}">
                    <button type="button" class="btn btn-primary">Oficinas e Unidades</button>
                  </a>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="btn-group" role="group" aria-label="Basic example">
              <div class="btn-group" role="group">
                  <a href="{{ route('inventarios.index') }}">
                    <button type="button" class="btn btn-primary">Realizar Inventario</button>
                  </a>
              </div>
          </div>
      </div>
    </div>
</div>    
@endsection