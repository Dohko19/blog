@extends('admin.layout')
@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Actualizar Permiso<h3>
				</div>
				<div class="box-body">
						@include('partials.error-messages')
					<form action="{{ route('admin.permissions.update', $permission) }}" method="POST">
						@method('PUT')
						@csrf
						<div class="form-group">
							<label for="display_name">Identificador:</label>
							<input disabled value="{{ $permission->name }}" class="form-control">
						</div>
						<div class="form-group">
							<label for="display_name">Nombre:</label>
							<input type="text" name="display_name" value="{{ old('display_name', $permission->display_name) }}" class="form-control">
						</div>
						<button class="btn btn-primary btn-block">Actualizar Permiso</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
@push('styles')
	<!-- Select2 -->
 	<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/select2.min.css') }}">
@endpush
@push('scripts')
	<!-- Select2 -->
	<script src="{{ asset('adminlte/plugins/select2/select2.full.min.js') }}"></script>
	<script>
		$(".select2").select2({
	    	roles: true,
	    });
	</script>
@endpush