@extends('layouts.layout')
@section('content')

    <section class="posts container">
@if (isset($title))
    <h2>{{ $title }}</h2>
@endif
        @foreach ($posts as $post)

        <article class="post">
            @include($post->viewType('home'))
            <div class="content-post">
                @include('posts.header')
                <h1>{{ $post->title}}</h1>
                <div class="divider"></div>
                <p>{{ $post->excerpt }}</p>
                <footer class="container-flex space-between">
                    <div class="read-more">
                        <a href="{{ route('posts.show', $post) }}" class="text-uppercase c-green">Leer más</a>
                    </div>
                    <div class="tags container-flex">
                        @include('posts.tags')
                    </div>
                </footer>
            </div>
        </article>
        @endforeach

    </section><!-- fin del div.posts.container -->
    {{ $posts->render("pagination::default") }}
   {{--  <div class="pagination">
        <ul class="list-unstyled container-flex space-center">
            <li><a href="#" class="pagination-active">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
        </ul>
    </div> --}}
@endsection