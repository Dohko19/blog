@extends('admin.layout')
@section('header')
<h1>
   	USUARIOS
    <small>Publicaciones</small>
</h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>

    <li class="active">Usuarios</li>
  </ol>
@endsection
@section('content')
<div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Listado de Usuarios</h3>
      <a href="{{ route('admin.users.create') }}" class="btn btn-primary pull-right">
        <i class="fa fa-plus"> </i> Crear usuario
      </a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="users-table" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Email</th>
          <th>Roles</th>
          <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        	@foreach ($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
          <td>{{ $user->getRoleNames()->implode(', ') }}</td>
					<td>
						<a href="{{ route('admin.users.show', $user) }}"
            class="btn btn-xs btn-default">
            <i class="fa fa-eye"></i></a>
            <a href="{{ route('admin.users.edit', $user) }}"
              class="btn btn-xs btn-info">
              <i class="fa fa-pencil"></i>
            </a>
            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display: inline;">
              @csrf
              @method('DELETE')
						  <button class="btn btn-xs btn-danger"><i class="fa fa-times"
                onclick="return confirm('Estas seguro de Eliminar esta usuario?')"></i></button>
            </form>
					</td>
				</tr>
        	@endforeach
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
</div>
@endsection
@push('styles')
 <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.css') }}">
@endpush
@push('scripts')
<!-- DataTables -->
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $('#users-table').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>

@endpush