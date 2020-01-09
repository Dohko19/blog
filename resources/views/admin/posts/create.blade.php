<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form method="POST" action="{{ route('admin.posts.store', '#create') }}">
    @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Titulo de la Publicacion</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
            {{-- <label for="">Titulo de la publicacion</label> --}}
            <input id="post-title" name="title" type="text" class="form-control" placeholder="Ingresa aqui el titulo de la publicacion" value="{{ old('title') }}" autofocus required>
            @error('title')
              <div class="help-block">
                <strong>{{ $message }}</strong>
              </div>
            @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-primary">Crear Publicacion</button>
        </div>
      </div>
    </div>
  </form>
</div>

@push('scripts')
  <script>
    if(window.location.hash === '#create')
    {
      $('#exampleModal').modal('show');
    }

    $('#exampleModal').on('hide.bs.modal', function(){
     window.location.hash = '#';
    });

    $('#exampleModal').on('shown.bs.modal', function(){
      $('#post-title').focus();
     window.location.hash = '#create';
    });
  </script>
@endpush