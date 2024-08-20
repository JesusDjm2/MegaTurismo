@extends('layouts.app')
@section('titulo', 'Inicio')
@section('contenido')
    <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner" style="height: 450px">
            @foreach ($tours as $key => $tour)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" style="height: 100%">
                    <img class="d-block zoom-in-image" src="{{ asset($tour->img) }}" alt="Slide {{ $key }}"
                        style="width:100%; object-fit: cover; height: 100%">
                    <div class="carousel-caption d-md-block" style="padding-bottom: 6%">
                        <h5>{{ $tour->nombre }}</h5>
                        {{-- <p>{{ $tour->descripcion }}</p> --}}
                        <p>
                            <span><i class="fa fa-dollar"></i> {{ $tour->precioReal }}.00 </span> &nbsp;&nbsp;&nbsp;
                            <span> <i class="fa fa-calendar"></i> {{ $tour->dias }} days </span>
                        </p>
                        <a class="cardBtn" href="{{ route('tour.show', ['slug' => $tour->slug]) }}">View details</a>
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
    <div id="tourCarousel" class="carousel slide mt-3" data-ride="carousel">
        <div class="carousel-inner">
            @php
                $active = 'active';
            @endphp
            @foreach ($gruposTours as $grupo)
                <div class="carousel-item {{ $active }}">
                    <div class="row">
                        @foreach ($grupo as $tour)
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <a href="{{ route('tour.show', $tour->slug) }}">
                                        <img alt="{{ $tour->nombre }}" src="{{ $tour->imgThumb }}" width="100%"
                                            style="height: 260px; object-fit: cover;">
                                    </a>
                                    <div class="cardMin">
                                        <span><i class="fa fa-dollar"></i> {{ $tour->precioReal }}</span>
                                        <span><i class="fa fa-map-marker"></i> {{ $tour->lugarInicio }} →
                                            {{ $tour->lugarFin }} </span>
                                        <span><i class="fa fa-calendar"></i> {{ $tour->dias }}
                                            days</span>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $tour->nombre }}</h4>
                                        <p class="card-text">{{ $tour->descripcion }}</p>
                                        <a class="cardBtn" href="{{ route('tour.show', $tour->slug) }}">View details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @php
                    $active = '';
                @endphp
            @endforeach
        </div>
        <div class="col-12 text-center">
            <a class="btn-slide mb-3 mr-1" href="#tourCarousel" role="button" data-slide="prev">
                <i class="fa fa-circle"></i>
            </a>
            <a class="btn-slide mb-3 " href="#tourCarousel" role="button" data-slide="next">
                <i class="fa fa-circle"></i>
            </a>
        </div>
    </div>
    <section>
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="cursiva">Top places</h2>
                    <p class="text-center">Best places to visit in Perú</p>
                </div>
                @foreach ($destinos->take(4) as $destino)
                    <div class="col-lg-3 circulares mt-3">
                        <a href="{{ route('destinies.show', $destino->slug) }}" target="_blank">
                            <div class="circular">
                                <img src="{{ asset('img/destinos/thumbs/' . $destino->imgThumb) }}"
                                    alt="{{ $destino->nombre }}" loading="lazy">
                                <h3>{{ $destino->nombre }}</h3>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <div class="container-fluid containerReviews">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <h2 class="cursiva">Reviews</h2>
            </div>
            <div class="col-lg-12">
                <div id="commentCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($reviews as $index => $grupoReviews)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <div class="row">
                                    @foreach ($grupoReviews as $review)
                                        <div class="col-lg-4 mb-3">
                                            <div class="row cardReview ml-1 mr-1">
                                                <div class="col-lg-4">
                                                    <div class="circulo">
                                                        <img src="{{ $review->img }}" alt="{{ $review->nombre }}"
                                                            loading="lazy">
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <h5>{{ $review->nombre }}</h5>
                                                    @for ($i = 0; $i < $review->calificacion; $i++)
                                                        <i class="fa fa-star" style="color: #08e5e5"></i>
                                                    @endfor
                                                    <p>{{ $review->comentario }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-12 text-center mt-4">
                        <a class="btn-slide mb-3 mr-1" href="#commentCarousel" role="button" data-slide="prev">
                            <i class="fa fa-circle"></i>
                        </a>
                        <a class="btn-slide mb-3" href="#commentCarousel" role="button" data-slide="next">
                            <i class="fa fa-circle"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="cursiva">Enjoy your</h2>
                    <h3 class="text-center" style="font-size:2.5em; font-weight:bold">Vacations in Peru</h3>
                    <p class="text-center">Our tour packages include the essentials for an unforgettable trip.</p>
                    <div class="row">
                        <div class="col-lg-3 text-center">
                            <img src="{{ asset('img/Restaurant.png') }}" width="100px" alt="Peruvian restaurants">
                            <h4 class="text-center">Restaurants</h4>
                            <p class="text-center">The best options for enjoy peruvian food.</p>
                        </div>
                        <div class="col-lg-3 text-center">
                            <img src="{{ asset('img/Tour-guide.png') }}" width="100px" alt="Peruvian tour guides">
                            <h4 class="text-center">Tour guides</h4>
                            <p class="text-center">We offer experienced and professional tour guides.</p>
                        </div>
                        <div class="col-lg-3 text-center">
                            <img src="{{ asset('img/transport-mega-turismo.png') }}" width="100px"
                                alt="Peruvian restaurants">
                            <h4 class="text-center">Transport</h4>
                            <p class="text-center">All transfers and transportation available during your trip</p>
                        </div>
                        <div class="col-lg-3 text-center">
                            <img src="{{ asset('img/hotel-service.png') }}" width="100px" alt="Peruvian tour guides">
                            <h4 class="text-center">Hotel</h4>
                            <p class="text-center">Option of including accommodation.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="custom mt-5">
            <div class="row" style="margin-left:0px; margin-right:0px">
                <div class="col-12 mb-5">
                    <h2 class="cursiva">Blogs Perú</h2>
                </div>
                @foreach ($blogs as $blog)
                    <div class="col-lg-3 custom-col">
                        <img src="{{ asset('img/blogs/thumbs/' . $blog->imgThumb) }}" width="100%"
                            alt="{{ $blog->titulo }}" loading="lazy">
                        <p class="tituloBlog">{{ $blog->nombre }}</p>
                        <div class="card-hover">
                            <h4>{{ $blog->nombre }}</h4>
                            <p>{{ $blog->resumen }}</p>
                            <a href="{{ route('enblogs.show', $blog->slug) }}" target="_blank">Leer blog</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
