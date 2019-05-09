 @extends('layouts.app')


  @section('content')
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Registro de Nuevo Usuario</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body" style="overflow: scroll;">
      <div class="panel panel-primary" >
        <div class="panel-heading">
          <h3 class="panel-title">Registro de nuevo Usuario</h3>
        </div>
        <div class="panel-body">
          {!! Form::open(['route' => 'users.store', 'method' => 'POST', 'files' => true]) !!}

            <div class="form-group">
              {!! form::label('name') !!}
              {!! form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre Completo', 'required']) !!}
            </div>
            <div class="form-group">
              {!! form::label('email') !!}
              {!! form::email('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'required']) !!}
            </div>
           
            <div class="form-group">
              {!! form::label('password') !!}
              {!! form::password('password', ['class' => 'form-control', 'placeholder' => '***********', 'required']) !!}
            </div>
            <div class="form-group">
              {!! form::label('type') !!}
              {!! form::select('type', ['' => 'Seleccione un nivel...', 'member' => 'Miembro', 'admin' => 'Administrador', 'soporte' => 'Soporte'], null, ['class'=> 'form-control']) !!}
            </div>
            
            <div class="form-group">
                 {!! form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
            </div>

        {!!Form::close()!!}
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

  <br>

  @endsection