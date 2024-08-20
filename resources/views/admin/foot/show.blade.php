@extends('layouts.app')
@section('titulo', $vista->nombre)
@section('contenido')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="title text-center">{{ $vista->nombre }}</h1>
                <div style="width: 50px; height: 4px; background-color: #08e5e5; margin: 6px auto 0;">
                </div>
            </div>
        </div>
        <div class="col-lg-12 mt-4">
            {!! $vista->texto !!}
        </div>
    </div>
@endsection
