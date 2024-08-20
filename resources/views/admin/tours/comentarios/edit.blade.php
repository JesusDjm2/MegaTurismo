@extends('admin.admin')
@section('titulo', 'Editar comentario en inglés')
@section('contenido')
    <div class="container">
        <h2>Editar Comentario en Inglés de: {{ $comment->nombre }}</h2>
        <form action="{{ route('enreviews.update', $comment->id) }}" method="POST" enctype="multipart/form-data">
            @csrf    
            @method('PUT')        
            @include('admin.tours.comentarios.form')
        </form>
    </div>
    @endsection
