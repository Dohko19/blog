@extends('admin.layout')
@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Crear Role<h3>
				</div>
				<div class="box-body">
						@include('partials.error-messages')
					<form action="{{ route('admin.roles.update', $role) }}" method="POST">
						@method('PUT')
							@include('admin.roles.form')
						<button class="btn btn-primary btn-block">Actualizar Role</button>
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