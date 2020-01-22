@extends('admin.layout')
@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Datos Personales<h3>
				</div>
				<div class="box-body">
					@if ($errors->any())
						<ul class="list-group">
							@foreach ($errors->all() as $error)
								<li class="list-group-item list-group-item-danger">
									{{ $error }}
								</li>
							@endforeach
						</ul>
					@endif
					<form action="{{ route('admin.users.store') }}" method="POST">
						@csrf
						<div class="form-group">
							<label for="name">Nombre:</label>
							<input type="text" name="name" value="{{ old('name') }}" class="form-control">
						</div>
						<div class="form-group">
							<label for="email">E-mail:</label>
							<input type="email" name="email" value="{{ old('email') }}" class="form-control">
						</div>

						<div class="form-group col-md-6 {{ $errors->has('roles') ? 'has-error' : '' }}">
			              	<label for="">Roles</label>
			              	<select name="roles[]" class="form-control select2"
			              	multiple="multiple"
			              	data-placeholder="Selecciona uno o mas roles"
			              	style="width: 100%;">
							@foreach ($roles as $role)
								<option{{ $user->roles->contains($role->id) ? 'selected' : '' }} value="{{ $role->name }}">{{ $role->name }}</option>
							@endforeach
			                </select>
			                @error('roles')
								<div class="help-block">
									<strong>{{ $message }}</strong>
								</div>
							@enderror
		              </div>
		              <div class="form-group col-md-6">
		              	<label for="">Permisos</label>
						@include('admin.permissions.checkboxes')
		              </div>
		              <span class="help-block">La contraseña sera generada y enviada al nuevo usuarios via email</span>
						<button class="btn btn-primary btn-block">Crear Usuario</button>
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