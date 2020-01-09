@extends('layouts.layout')
@section('title', $post->title)
@section('meta-description', $post->excerpt)
@section('content')
<article class="post container" style="padding-right: 0px; padding-left: 0px">

  @include($post->viewType())

    <div class="content-post">
      @include('posts.header')
      <h1>{{ $post->title }}</h1>
        <div class="divider"></div>
        <div class="image-w-text">
			{!! $post->body !!}
          </div>
        </div>

        <footer class="container-flex space-between">
		      @include('partials.social-links', ['description' => $post->title])
          <div class="tags container-flex">
            @include('posts.tags')
          </div>
      </footer>
      <div class="comments">
      <div class="divider"></div>
        <div id="disqus_thread"></div>
		@include('partials.disqus-script')

      </div><!-- .comments -->
    </div>
  </article>
@endsection
@push('styles')
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

@endpush
@push('scripts')
	<script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
@endpush