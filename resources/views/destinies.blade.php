@extends('layouts.app')
@section('titulo', 'Find the best destinations to visit Peru, a land full of history, gastronomy, culture and adventure!')
@section('contenido')
    <div class="custom-container-2">
        <img src="{{ asset('img/fondos/destinies-peru.webp') }}" alt="Peru Mega Turismo">
        <h1>Destinies Perú</h1>
    </div>
    <div class="container mt-5">
        <div class="row cardDestino">
            @foreach ($destinos as $destiny)
                <div class="col-lg-4 mb-4">
                    <div class="card mx-auto" style="width: 22rem;">
                        <a href="{{ route('destinies.show', $destiny->slug) }}">
                            <img class="card-img-top" src="{{ asset('img/destinos/thumbs/' . $destiny->imgThumb) }}"
                                alt="{{ $destiny->nombre }}">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $destiny->nombre }}</h5>
                            <p class="card-text text-justify">{!! \Illuminate\Support\Str::words(strip_tags($destiny->descripcion), 25, '...') !!}</p>

                            <a href="{{ route('destinies.show', $destiny->slug) }}" class="cardBtn">View
                                destiny</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
