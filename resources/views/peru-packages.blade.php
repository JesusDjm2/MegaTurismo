@extends('layouts.app')
@section('titulo', 'Packages tours for Perú')
@section('contenido')
    <div class="custom-container-2">
        <img src="{{ asset('img/fondos/Peru-Mega-Turismo.webp') }}" alt="Peru Mega Turismo">
        <h1>Peru Packages</h1>
    </div>
    <div class="container mt-5"> 
        <div class="row">
            <div class="col-12 text-justify">
                <p>
                    Full of mystery and culture dating back millennia, Peru is an indomitable land of deserts etched with
                    ancient geoglyphs, rainforests teeming with wildlife, and soaring peaks harbouring secret cities.
                </p>
                <p>
                    While many travellers come to visit one of South America's most famous sites, the ruins of Machu Picchu,
                    the real Peru lies within its warm, proud inhabitants – many of whom can trace their bloodlines back to
                    the Incas. What you might not expect is the foodie bonanza found in Lima or the adventures that await
                    you in the ancient capital of Cusco. Whether you’re exploring the cobbled streets of Arequipa, bobbing
                    on the floating islands of Lake Titicaca or uncovering mummies in Nazca, our Peru tours will have you
                    feeling like a modern-day Indiana Jones. Just don’t forget to pack your fedora.
                </p>
            </div>
            <div class="col-12">
                <h2>Top Peru travel deals</h2>
            </div>
            <div class="col-lg-12 mt-3">
                <div class="table-responsive">
                    <table class="table table-hover tableMega">
                        <thead>
                            <tr>
                                <th>Thumb</th>
                                <th>Trip</th>
                                <th>Route</th>
                                <th>Days</th>
                                <th>From</th>
                                <th>Visit Tour</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tours as $tour)
                                <tr>
                                    <td class="align-middle"><img src="{{ asset($tour->imgThumb) }}"
                                            alt="{{ $tour->nombre }}">
                                    </td>
                                    <td class="align-middle"><strong>{{ $tour->nombre }}</strong> <br>
                                        {{ $tour->lugarInicio }}
                                        → {{ $tour->lugarFin }}</td>
                                    <td class="align-middle">
                                        <div class="modal fade" id="imageModal{{ $tour->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <h4 class="text-center">{{ $tour->nombre }}</h4>
                                                        <img class="imgPopup" src="{{ asset($tour->mapa) }}"
                                                            alt="{{ $tour->nombre }}" width="100%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{{ asset($tour->mapa) }}" alt="{{ $tour->nombre }}" data-toggle="modal"
                                            data-target="#imageModal{{ $tour->id }}">
                                    </td>
                                    <td class="align-middle">{{ $tour->dias }}</td>
                                    <td class="align-middle"><del>U${{ $tour->precioReal }}.00</del><br><span
                                            class="precioTour"> U${{ $tour->precioPublicado }}.00</span></td>
                                    <td class="align-middle"><a
                                            href="{{ route('tour.show', ['slug' => $tour->slug]) }}">View
                                            tour ⮞</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

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
