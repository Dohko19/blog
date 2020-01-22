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
				<form action="{{ route('admin.users.update', $user) }}" method="POST">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label for="name">Nombre:</label>
						<input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
					</div>
					<div class="form-group">
						<label for="email">E-mail:</label>
						<input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control">
					</div>

					<div class="form-group">
						<label for="password">Contraseña:</label>
						<input type="password" name="password" class="form-control" placeholder="Contraseña">
						<span class="help-block">Dejar en blanco si no quieres cambiar la contraseña</span>
					</div>

					<div class="form-group">
						<label for="password_confirmation">Repite Contraseña:</label>
						<input type="password" name="password_confirmation" class="form-control" placeholder="Repite la Contraseña">
					</div>
					<button class="btn btn-primary btn-block">Actualizar</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Roles</h3>
			</div>
			<div class="box-body">
				<form method="POST" action="{{ route('admin.users.roles.update', $user) }}">
					@csrf
					@method('PUT')

					@include('admin.roles.checkboxes')
					<button class="btn btn-primary btn-block">Actualizar Roles</button>
				</form>
			</div>
		</div>
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Permisos</h3>
			</div>
			<div class="box-body">
				<form method="POST" action="{{ route('admin.users.permissions.update', $user) }}">
					@csrf
					@method('PUT')
					@include('admin.permissions.checkboxes', ['some' => 'data'])
					<button class="btn btn-primary btn-block">Actualizar permisos</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection