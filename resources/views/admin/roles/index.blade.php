@extends('admin.layout')
@section('header')
<h1>
   	Roles
    <small>Publicaciones</small>
</h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>

    <li class="active">Roles</li>
  </ol>
@endsection
@section('content')
<div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Listado de Roles</h3>
      @can('create', $roles->first())
      <a href="{{ route('admin.roles.create') }}" class="btn btn-primary pull-right">
        <i class="fa fa-plus"> </i> Crear roles
      </a>
      @endcan
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="roles-table" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Identificador</th>
          <th>Nombre</th>
          <th>Permisos</th>
          <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        	@foreach ($roles as $role)
				<tr>
					<td>{{ $role->id }}</td>
					<td>{{ $role->name }}</td>
          <td>{{ $role->display_name }}</td>
          <td>{{ $role->permissions->pluck('display_name')->implode(', ') }}</td>
					<td>
            @can('update', $role)
            <a href="{{ route('admin.roles.edit', $role) }}"
              class="btn btn-xs btn-info">
              <i class="fa fa-pencil"></i>
            </a>
            @endcan
            @can('delete', $role)
              @if ($role->id !== 1)
              <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
  						  <button class="btn btn-xs btn-danger"><i class="fa fa-times"
                  onclick="return confirm('Estas seguro de Eliminar esta role?')"></i></button>
              </form>
              @endif
            @endcan
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
    $('#roles-table').DataTable({
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
