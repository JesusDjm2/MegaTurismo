@extends('layouts.app')
@section('titulo', 'Peru blogs for travellers')
@section('contenido')
    <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner" style="height: 450px">
            @foreach ($blogsHead as $key => $blog)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" style="height: 100%">
                    <img class="d-block zoom-in-image" src="{{ asset('img/blogs/' . $blog->imgBig) }}"
                        alt="Slide {{ $key }}" style="width:100%; object-fit: cover; height: 100%">
                    <div class="carousel-caption d-md-block" style="bottom:100px">
                        <h5>{{ $blog->nombre }}</h5>
                        <p>{{ $blog->resumen }}</p>
                        <a class="cardBtn" href="{{ route('enblogs.show', $blog->slug) }}">Read blog</a>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleSlidesOnly" role="button" data-slide="prev">
            <span class="prev" aria-hidden="true">
                < <span class="sr-only">Previous
            </span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleSlidesOnly" role="button" data-slide="next">
            <span class="next" aria-hidden="true">></span>
            <span class="sr-only">Next</span>
        </a>
        <ol class="carousel-indicators">
        </ol>
    </div>
    <div class="container mt-5">
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <a href="{{ route('enblogs.show', $blog->slug) }}">
                            <img alt="" src="{{ asset('img/blogs/thumbs/' . $blog->imgThumb) }} "
                                style="width: 100%; height:260px; object-fit:cover">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title">{{ $blog->nombre }}</h4>
                            <p class="card-text">{{ $blog->resumen }}</p>
                            <p>
                                @foreach ($blog->tags as $tag)
                                    <a>#{{ $tag->nombre }}</a>&nbsp;
                                @endforeach
                            </p>
                            <a class="cardBtn" href="{{ route('enblogs.show', $blog->slug) }}">Read blog</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            @foreach ($blogsCards as $blog)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <a href="{{ route('enblogs.show', $blog->slug) }}">
                            <img alt="{{ $blog->nombre }}" src="{{ asset('img/blogs/thumbs/' . $blog->imgThumb) }}"
                                loading="lazy" width="100%" style="height: 200px; object-fit: cover">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title">{{ $blog->nombre }}</h4>
                            <p class="card-text">{{ $blog->resumen }}</p>
                            <p>
                                @foreach ($blog->tags as $tag)
                                    <a>#{{ $tag->nombre }}</a>&nbsp;
                                @endforeach
                            </p>
                            <a class="cardBtn" href="{{ route('enblogs.show', $blog->slug) }}">Read blog</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection
