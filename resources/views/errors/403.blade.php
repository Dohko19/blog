@extends('layouts.layout')
@section('content')
<section class="pages container">
	<div class="page page-about">
		<h1 class="text-capitalize">No tienes Permisos para ver esta pagina</h1>
		<span style="color: red;">{{ $exception->getMessage() }}</span>
		<p><a href="{{ url()->previous() }}">Regresar</a></p>
	</div>
</section>
@endsection