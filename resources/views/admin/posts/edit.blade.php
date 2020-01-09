@extends('admin.layout')
@section('header')
<h1>
   	POSTS
    <small>Crear Publicacion</small>
</h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ route('admin.posts.index') }}"><i class="fa fa-list"></i> Posts</a></li>
    <li class="active">Crear</li>
  </ol>
@endsection
@section('content')
<div class="row">
	@if ($post->photos->count())
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-body">
				<div class="row">
					@foreach ($post->photos as $photo)
						<form method="POST" action="{{ route('admin.photos.destroy', $photo) }}">
							@method('DELETE') @csrf
							<div class="col-md-2">
								<button class="btn-danger btn-xs btn" style="position: absolute;">
									<i class="fa fa-remove"></i>
								</button>
								<img class="img-responsive" src="{{ url($photo->url) }}" alt="">
							</div>
						</form>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	@endif

	<form method="POST" action="{{ route('admin.posts.update', $post) }}">
		@csrf
		@method('PUT')
		<div class="col-md-8">
			<div class="box box-primary">
				<div class="box-body">
					<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
						<label for="">Titulo de la publicacion</label>
						<input name="title" type="text" class="form-control" placeholder="Ingresa aqui el titulo de la publicacion" value="{{ old('title', $post->title) }}">
						@error('title')
							<div class="help-block">
								<strong>{{ $message }}</strong>
							</div>
						@enderror
					</div>
					<div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
						<label for="">Contenido de la publicacion</label>
						<textarea name="body" id="editor"
						class="form-control "
						rows="15" placeholder="Ingresa el Contenido Completo de la publicacion">{{ old('body', $post->body) }}</textarea>
						@error('body')
							<div class="help-block">
								<strong>{{ $message }}</strong>
							</div>
						@enderror
					</div>
					<div class="form-group {{ $errors->has('iframe') ? 'has-error' : '' }}">
						<label for="">Contenido Embebido (iframe)</label>
						<textarea name="iframe" id="editor"
						class="form-control "
						rows="2" placeholder="Ingresa el Contenido embebido (iframe) de audio o video">{{ old('iframe', $post->iframe) }}</textarea>
						@error('iframe')
							<div class="help-block">
								<strong>{{ $message }}</strong>
							</div>
						@enderror
					</div>

				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-body">
				<!-- Date -->
		              <div class="form-group">
		                <label>Fecha de Publicacion:</label>

		                <div class="input-group date">
		                  <div class="input-group-addon">
		                    <i class="fa fa-calendar"></i>
		                  </div>
		                  <input name="published_at" type="text" class="form-control pull-right" id="datepicker" value="{{ old('published_at', $post->published_at ? $post->published_at->format('m/d/y') : null ) }}">
		                </div>
		                <!-- /.input group -->
		              </div>
		              <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
		              	<label for="">Categorias</label>
		              	<select name="category_id" id="" class="form-control select2">
		              		<option value="">Selecciona una Categoria</option>
		              		@foreach ($categories as $category)
		              			<option value="{{ $category->id }}"
									{{ old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}
		              				>{{ $category->name }}</option>
		              		@endforeach
		              	</select>
		              	@error('category_id')
							<div class="help-block">
								<strong>{{ $message }}</strong>
							</div>
						@enderror
		              </div>
		              <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
		              	<label for="">Etiquetas</label>
		              	<select name="tags[]" class="form-control select2"
		              	multiple="multiple"
		              	data-placeholder="Selecciona una o mas etiquetas"
		              	style="width: 100%;">
						@foreach ($tags as $tag)
							<option {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }}</option>
						@endforeach
		                </select>
		                @error('tags')
							<div class="help-block">
								<strong>{{ $message }}</strong>
							</div>
						@enderror
		              </div>
					  <div class="form-group {{ $errors->has('excerpt') ? 'has-error' : '' }}">
						<label for="">Extracto de la publicacion</label>
						<textarea name="excerpt" class="form-control"rows="4" placeholder="Ingresa un Estracto de la publicacion">{{ old('excerpt', $post->excerpt) }}</textarea>
						@error('excerpt')
							<div class="help-block">
								<strong>{{ $message }}</strong>
							</div>
						@enderror
					  </div>
					  <div class="form-group ">
					  	<div class="dropzone"></div>
					  </div>
					  <div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Guardar Publicacion</button>
					  </div>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection
@push('styles')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">
	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="{{ asset('adminlte/plugins/datepicker/datepicker3.css') }}">
	<!-- Select2 -->
 	<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/select2.min.css') }}">

@endpush
@push('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
	<script src="{{ asset('adminlte/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
	{{-- <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script> --}}
	<script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
	<!-- Select2 -->
	<script src="{{ asset('adminlte/plugins/select2/select2.full.min.js') }}"></script>
	<script>
		//Date picker
	    $('#datepicker').datepicker({
	      autoclose: true
	    });

	    CKEDITOR.replace('editor');
	    CKEDITOR.config.height = 315;
	    //Initialize Select2 Elements
	    $(".select2").select2({
	    	tags: true,
	    });

	    var myDropzone = new Dropzone('.dropzone', {
	    	url: '/admin/posts/{{ $post->url }}/photos',
	    	paramName: 'photo',
	    	acceptedFiles: 'image/*',
	    	maxFilesize: 2,
	    	// maxFiles: 8,
	    	headers: {
	    		'X-CSRF-TOKEN': '{{ csrf_token() }}'
	    	},
	    	dictDefaultMessage: 'Arrastra las fotos aqui para subirlas'
	    });
	    myDropzone.on('error', function(file, res){
	    	var msg = res.errors.photo[0];
	    	$('.dz-error-message:last > span').text(msg);
	    });
	    Dropzone.autoDiscover = false;
	</script>
@endpush