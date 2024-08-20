@extends('layouts.app')
@section('titulo', 'Blogs con tag ' . $tag->nombre)
@section('contenido')
<div class="custom-container-2">
    <img src="{{ asset('img/fondos/Urubamba-amazing-view.webp') }}" alt="Peru Mega Turismo">
    <h1>Blogs referred to tag <span class="colorPrincipal">'{{$tag->nombre}}'</span></h1>
</div>
<div class="container mt-5">
    <div class="row">
        @foreach ($blogs as $blog)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <a href="{{ route('enblogs.show', $blog->slug) }}">
                        <img alt="" src="{{ asset('img/blogs/thumbs/' . $blog->imgThumb) }}" style="width:100%">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">{{ $blog->nombre }}</h4>
                        <p class="card-text">{{ $blog->resumen }}</p>
                        <p>
                            @foreach ($blog->tags as $tag)
                                <a class="btnTag" href="{{ route('entag.show', $tag->slug) }}">#{{ $tag->nombre }}</a>&nbsp;
                            @endforeach
                        </p>
                        <a class="cardBtn" href="{{ route('enblogs.show', $blog->slug) }}">View details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
