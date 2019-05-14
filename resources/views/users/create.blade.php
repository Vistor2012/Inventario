 @extends('layouts.app')


  @section('content')
  <!-- Default box -->
  <div class="box col-md-12">
    <div class="box-header with-border">
      <h3 class="box-title">Registro de Nuevo Usuario</h3>
    </div>
    <div class="box-body">
      <div class="panel panel-primary" >
        <div class="panel-heading">
          <h3 class="panel-title">Registro de nuevo Usuario</h3>
        </div>
        <div class="panel-body">
          <form method='POST' id='inv_form'>
            <div class="form-group col-md-12">
                <label for="">Carnet de Identidad</label>
                <input type="text" name="nro_dip" class="form-control" placeholder="Carnet de Identidad" required>
            </div>
            <div class="form-group col-md-12">
                <label for="">Usuario</label>
                <input type="text" name="usuario" class="form-control" placeholder="Usuario" required>
            </div>

            <div class="form-group col-md-12">
                <label for="">Contraseña</label>
                <input type="password" name="clave" class="form-control" placeholder="***********" required>
            </div>
            <div>
                <ul class="list-inline pull-right">
                  <div class="form-group col-md-12">
                      <button type="submit" class="btn btn-primary next-step">Registrar</button>
                  </div>
                </ul>
            </div>
          </form>
        </div>
        <div class="panel-footer">Registro de Usuario</div>
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
    </div>
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->

  @endsection