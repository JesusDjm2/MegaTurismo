@extends('layouts.app')
@section('titulo', 'Search results for blogs')
@section('contenido')
    <div class="custom-container-2">
        <img src="{{ asset('img/fondos/Peru-adventure-tours.jpg') }}" alt="Peru Mega Turismo">
        <h1>Search results for '{{ $searchTerm }}':</h1>
    </div>
    <div class="container mt-5">
        <div class="row">
            @foreach ($results as $blog)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <a href="{{ route('enblogs.show', $blog->slug) }}">
                            <img alt="{{ $blog->nombre }}" src="{{ asset('img/blogs/thumbs/' . $blog->imgThumb) }}"
                                loading="lazy" width="100%" style="height: 200px; object-fit: cover">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title">{{ $blog->nombre }}</h4>
                            <p class="card-text">{{ $blog->resumen }}</p>
                            {{-- <p>
                                @foreach ($blog->tags as $tag)
                                    <a>#{{ $tag->nombre }}</a>&nbsp;
                                @endforeach
                            </p> --}}
                            <a class="cardBtn" href="{{ route('enblogs.show', $blog->slug) }}">Read blog</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
