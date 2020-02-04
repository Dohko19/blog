@csrf
<div class="form-group">
	<label for="name">Identificador:</label>
	@if ($role->exists)
		<input type="text" value="{{ $role->name }}" class="form-control" disabled>
	@else
		<input name="name" type="text" value="{{ old('name', $role->name) }}" class="form-control">
	@endif
</div>
<div class="form-group">
	<label for="display_name">Nombre:</label>
	<input type="text" name="display_name" value="{{ old('display_name', $role->display_name) }}" class="form-control">
</div>
<div class="form-group">
	<label for="guard">Guard:</label>
	<select name="guard_name" class="form-control">
		@foreach (config('auth.guards', $role->guard_name) as $guardName => $guard)
			<option {{ old('guard_name') === $guardName ? 'selected' : '' }} value="{{ $guardName }}">{{ $guardName }}</option>
		@endforeach
	</select>
</div>
	<div class="form-group col-md-6">
		<label for="">Permisos</label>
	@include('admin.permissions.checkboxes', ['model' => $role])
	</div>