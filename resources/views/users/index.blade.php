@extends('layouts.app')

@section('content')
<!-- Default box <--</-->
<div class="box">
  <div class="box-header with-border">
    <center><h1 class="box-title">Registro de Usuarios</h1></center>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body" style="overflow: scroll;">
    <a href="{{ Route('users.create') }}">
      <button type="button" class="btn btn-primary btn-lg">Registrar Nuevo Usuario</button>
    </a>
    <div class="navbar-form pull-right" role="toolbar" aria-label="Toolbar with button groups">
      <div class="input-group">
        {!! Form::open(['route' => 'users.index', 'method' => 'GET', 'files' => true, 'class' => 'navbar-form pull-right']) !!}
          <div class="input-group">
            
            {!! Form::text('name', null,['class' => 'form-control', 'placeholder' => 'Buscar Usuario...', 'aria-describedby' => 'search']) !!}
            <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
            
          </div>
            
        {!!Form::close()!!}  
      </div>
    </div>

    <br>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Correo</th>
          <th>Tipo</th>
          
         
          <th>Opciones</th>
          

        </tr>
      </thead>
      <tbody>
        @foreach($user as $use)
        <tr>
          <td>{{ $use->name}}</td>
          <td>{{ $use->email}}</td>
          <td>
            @if($use->type == "admin")
              <span class="label label-primary">Administrador</span>
            @else
              @if($use->type == "member")
                <span class="label label-danger">Miembro</span>
              @else
                <span class="label label-danger">Soporte</span>
              @endif
            @endif
          </td>

          <td>
            <a href="{{ route('users.edit',$use->id) }}">
              <button type="button" class="btn btn-warning">Modificar</button>
            </a>
            <a href="{{ route('users.destroy', $use->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')">
              <button type="button" class="btn btn-danger">Eliminar</button>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
  </div>
  <!-- /.box-footer-->
</div>
<!-- /.box -->
@endsection