@extends('admin.admin')
@section('contenido')
    <form action="{{ isset($item) ? route('nosotros.update', $item->id) : route('nosotros.store') }}" method="POST">
        @csrf
        @if (isset($item))
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="form-control"
                value="{{ isset($item) ? $item->nombre : '' }}">
        </div>

        <div class="form-group">
            <label for="texto">Texto:</label>
            <textarea id="texto" name="texto" class="ckeditor form-control">{{ isset($item) ? $item->texto : '' }}</textarea>
        </div>

        <div class="form-group">
            <label for="slug">Slug:</label>
            <input type="text" id="slug" name="slug" class="form-control"
                value="{{ isset($item) ? $item->slug : '' }}">
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($item) ? 'Actualizar' : 'Crear' }}</button>
    </form>
@endsection
