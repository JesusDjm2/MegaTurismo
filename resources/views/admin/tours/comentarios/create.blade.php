@extends('admin.admin')
@section('titulo', 'Crear nuevo comentario en inglés')
@section('contenido')
    <div class="container">
        <h2>Crear Comentario en Inglés</h2>
        <form action="{{ route('enreviews.store') }}" method="POST" enctype="multipart/form-data">
            @csrf            
            @include('admin.tours.comentarios.form')
        </form>
    </div>
@endsection
