@extends('admin.layout')
@section('header')
<h1>
   	POSTS
    <small>Publicaciones</small>
</h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>

    <li class="active">Posts</li>
  </ol>
@endsection
@section('content')
<div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Listado de Publicaciones</h3>
      <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-plus"> </i> Crear publicacion</button>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="posts-table" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Titulo</th>
          <th>Extracto</th>
          <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        	@foreach ($posts as $post)
				<tr>
					<td>{{ $post->id }}</td>
					<td>{{ $post->title }}</td>
					<td>{{ $post->excerpt }}</td>
					<td>
						<a href="{{ route('posts.show', $post) }}"
            class="btn btn-xs btn-default"
            target="_blank">
            <i class="fa fa-eye"></i></a>
            <a href="{{ route('admin.posts.edit', $post) }}"
              class="btn btn-xs btn-info">
              <i class="fa fa-pencil"></i>
            </a>
            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" style="display: inline;">
              @csrf
              @method('DELETE')
						  <button class="btn btn-xs btn-danger"><i class="fa fa-times"
                onclick="return confirm('Estas seguro de Eliminar esta publicacion?')"></i></button>
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
    $('#posts-table').DataTable({
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