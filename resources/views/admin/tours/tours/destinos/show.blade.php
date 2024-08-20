@extends('layouts.app')
@section('titulo', $destino->nombre)
@section('contenido')
@auth
    <a href="{{ route('destinies.edit', $destino->id) }}" target="_blank" class="botonEdicion">Editar Destino</a>
@endauth
    <div class="custom-container-2">
        <img src="{{ asset('img/destinos/' . $destino->img) }}" alt="{{ $destino->nombre }}">
        <h1 class="title">{{ $destino->nombre }}</h1>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="migas mb-2 mt-2 d-flex align-items-center justify-content-center">
                    <span><a href="{{ route('index') }}">Home</a></span>
                    <span><a href="">→ Destinies </a> </span>
                    <span><a>→ {{ $destino->nombre }}</a></span>
                </div>
            </div>
            <div class="col-lg-12 text-justify">
                <h3>{{ $destino->nombre }}</h3>
                {!! $destino->descripcion !!}
            </div>
            <div class="col-lg-12">
                
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <h3 class="text-center mt-4">Tours con destino {{ $destino->nombre }}:</h3>
        <div style="background:#15c9c9; width: 60px; height:3px;" class="mx-auto mb-4"></div>
                <div class="row">
                    @foreach ($tours as $tour)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <a href="{{ route('tour.show', $tour->slug) }}">
                                <img alt="{{ $tour->nombre }}" src="{{asset( $tour->imgThumb) }}" loading="lazy" style="width: 100%; height:220px; object-fit: cover">
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
@endsection
