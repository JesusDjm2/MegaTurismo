@extends('admin.admin')

@section('titulo', 'Crear Menú Inglés')

@section('contenido')
    <div class="container">
        <h1>Crear Menú en Inglés</h1>
        <form action="{{ route('menuen.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="correo1">Correo 1:</label>
                <input type="text" class="form-control" id="correo1" name="correo1">
            </div>
            <div class="form-group">
                <label for="correo2">Correo 2:</label>
                <input type="text" class="form-control" id="correo2" name="correo2">
            </div>
            <div class="form-group">
                <label for="redes_sociales">Redes Sociales:</label>
                <div class="row">
                    @foreach ($redes as $value => $label)
                        <div class="col-md-2">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="redes_sociales_{{ $value }}" name="redes_sociales[]" value="{{ $value }}">
                                <label class="form-check-label" for="redes_sociales_{{ $value }}">{{ $label }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>           
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
