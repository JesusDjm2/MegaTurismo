@extends('layouts.app')
@section('titulo', 'Search results for tours')
@section('contenido')
    <div class="custom-container-2">
        <img src="{{ asset('img/fondos/Peru-adventure-tours.jpg') }}" alt="Peru Mega Turismo">
        <h1>Search results for '{{ $searchTerm }}':</h1>
    </div>
    <div class="container-fluid mt-5">
        <div class="row">
                @foreach ($results as $tour)
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
@endsection
