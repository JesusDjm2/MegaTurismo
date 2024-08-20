@extends('admin.admin')
@section('titulo', 'Editar informacion de contacto')
@section('contenido')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 justify-content-center align-items-center">
                <h5>Editar informacion de contacto</h5>
                <a href="{{ route('aboutus.index') }}" class="btn btn-danger btn-sm float-right">Volver</a>
            </div>
        </div>
        <form action="{{ isset($footContact) ? route('aboutus.update', $footContact->id) : route('aboutus.store') }}"
            method="POST">
            @csrf
            @if (isset($footContact))
                @method('PUT')
            @endif
            <div class="row">
                <div class="col-lg-6 mt-3">
                    <label for="correo1">Correo 1:</label>
                    <input type="text" class="form-control" id="correo1" name="correo1"
                        value="{{ isset($footContact) ? $footContact->correo1 : '' }}">
                </div>
                <div class="col-lg-6 mt-3">
                    <label for="correo2">Correo 2:</label>
                    <input type="text" class="form-control" id="correo2" name="correo2"
                        value="{{ isset($footContact) ? $footContact->correo2 : '' }}">
                </div>
                <div class="col-lg-6 mt-3">
                    <label for="telefono1">Teléfono 1:</label>
                    <input type="text" class="form-control" id="telefono1" name="telefono1"
                        value="{{ isset($footContact) ? $footContact->telefono1 : '' }}">
                </div>
                <div class="col-lg-6 mt-3">
                    <label for="telefono2">Teléfono 2:</label>
                    <input type="text" class="form-control" id="telefono2" name="telefono2"
                        value="{{ isset($footContact) ? $footContact->telefono2 : '' }}">
                </div>
                <div class="col-lg-6 mt-3">
                    <label for="address">Dirección:</label>
                    <input type="text" class="form-control" id="address" name="address"
                        value="{{ isset($footContact) ? $footContact->address : '' }}">
                </div>
                <div class="col-lg-6 mt-3">
                    <label for="address2">Dirección 2:</label>
                    <input type="text" class="form-control" id="address2" name="address2"
                        value="{{ isset($footContact) ? $footContact->address2 : '' }}">
                </div>
                <div class="col-lg-12 mt-3">
                    <button type="submit" class="btn btn-primary  btn-sm">{{ isset($footContact) ? 'Actualizar' : 'Crear' }}</button>
                    <a href="{{ route('aboutus.index') }}" class="btn btn-danger btn-sm float-right">Cancelar</a>
                </div>
            </div>

        </form>
    </div>

@endsection
