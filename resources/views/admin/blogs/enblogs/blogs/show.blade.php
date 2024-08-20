@extends('layouts.app')
@section('titulo', $blog->nombre)
@section('contenido')
    @auth
        <a href="{{ route('enblogs.edit', $blog->id) }}" target="_blank" class="botonEdicion">Editar Blog</a>
    @endauth
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-4 mb-4">
                <div class="migas">
                    <span><a href="{{ route('index') }}">Home</a> ⮞</span>
                    <span><a href="">Blog</a> ⮞</span>
                    <span>{{ $blog->nombre }}</span>
                </div>
            </div>
            <div class="col-lg-12">

            </div>
            <div class="col-lg-12 mb-5">
                <div class="row">
                    <div class="col-lg-8">
                        <h1>{{ $blog->nombre }}</h1>
                        <p style="terxt-transform: uppercase">Updated on:
                            <span style="color: #15c9c9; font-weight: bold">
                                {{ $blog->created_at->format('jS F Y') }}
                            </span>
                        </p>
                        <img src="{{ asset('img/blogs/' . $blog->imgBig) }}" class="principalBlogs"
                            alt="{{ $blog->nombre }}">
                        <div class="contenido mt-4 text-justify">
                            {!! $blog->descripcion !!}
                        </div>
                        <div class="share">
                            <h3>Share this Blog: </h3>
                            <div class="lineaBlog2"></div>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ request()->fullUrl() }}"
                                target="_blank" rel="nofollow noopener noreferrer" target="_blank" rel="noopener nofollow"
                                class="btn-social">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ request()->fullUrl() }}&text={{ urlencode($blog->descripcion . ' #travel') }}
                                    "
                                target="_blank" rel="nofollow noopener noreferrer" target="_blank" rel="noopener"
                                class="btn-social">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="https://wa.me/?text={{ request()->fullUrl() }}" target="_blank" rel="noopener"
                                class="btn-social">
                                <i class="fa fa-whatsapp"></i>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ request()->fullUrl() }}&title={{ $blog->nombre }}&summary={{ $blog->descripcion }}&source=Nc Travel Cusco"
                                target="_blank" rel="noopener nofollow" class="btn-social">
                                <i class="fa fa-linkedin"></i>
                            </a>
                            <a href="https://www.pinterest.com/pin/create/button/?url={{ request()->fullUrl() }}&description={{ urlencode($blog->nombre . ': ' . $blog->descripcion) }}"
                                target="_blank" rel="noopener" class="btn-social">
                                <i class="fa fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-5">
                        <div class="sticky">
                            <form action="{{route('blogSearch')}}" method="get">
                                @csrf
                                <div class="form-row">
                                    <div class="form-outline">
                                        <input type="text" id="name" name="searchTerm"
                                            class="form-control form-control-sm" placeholder="Search blog..." required>
                                    </div>
                                    <input type="submit" id="buscar" class="botonBlog" value="Search">
                                </div>
                            </form>
                            <div class="tagsRelacionados">
                                <h3>Blog tags</h3>
                                <div class="lineaBlog"></div>
                                @foreach ($blog->tags as $tag)
                                    <a href="" class="tag">{{ $tag->nombre }}</a>
                                @endforeach
                                <div class="linea"
                                    style="width: 100%; height: 1px; background-color: #000000; margin-top: 30px"></div>
                                <h3 class="mt-4">Related Blogs</h3>
                                <div class="lineaBlog"></div>
                                @foreach ($blogs as $b)
                                    <div class="row related">
                                        <div class="col-4">
                                            <a href="{{ route('enblogs.show', $b->slug) }}">
                                                <img src="{{ asset('img/blogs/thumbs/' . $b->imgThumb) }}"
                                                    class="img-fluid" alt="{{ $b->nombre }}" loading="lazy">
                                            </a>
                                        </div>
                                        <div class="col-8">
                                            <a href="{{ route('enblogs.show', $b->slug) }}">
                                                <h5>{{ $b->nombre }}</h5>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="col-lg-12">
            <h2 class="cursiva mb-4 mt-5">We recommend these tours:</h2>
        </div>
        <div class="col-lg-12">
            <div class="row">
                @foreach ($tours as $tour)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <a href="{{ route('tour.show', $tour->slug) }}">
                                <img alt="{{ $tour->nombre }}" src="{{ asset($tour->imgThumb) }}" loading="lazy"
                                    style="width: 100%; height:220px; object-fit: cover">
                            </a>
                            <div class="cardMin">
                                <span><i class="fa fa-dollar"></i> {{ $tour->precioReal }}</span>
                                <span><i class="fa fa-map-marker"></i> {{ $tour->lugarInicio }} →
                                    {{ $tour->lugarFin }} </span>
                                <span><i class="fa fa-calendar"></i> {{ $tour->dias }} days</span>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">{{ $tour->nombre }}</h4>
                                <p class="card-text">{{ $tour->descripcion }}</p>
                                <a class="cardBtn" href="{{ route('tour.show', $tour->slug) }}"
                                    class="btn btn-primary">View details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
