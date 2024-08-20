@extends('admin.admin')

@section('titulo', 'Editar Menú Inglés')

@section('contenido')
    <div class="container">
        <h1>Editar Menú en Inglés</h1>
        <form action="{{ route('menuen.store', $menuEn->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="correo1">Correo 1:</label>
                <input type="text" class="form-control" id="correo1" name="correo1" value="{{ isset($menuEn) ? $menuEn->correo1 : '' }}">
            </div>
            <div class="form-group">
                <label for="correo2">Correo 2:</label>
                <input type="text" class="form-control" id="correo2" name="correo2" value="{{ isset($menuEn) ? $menuEn->correo2 : '' }}">
            </div>
            <div class="form-group">
                <label for="redes_sociales">Redes Sociales:</label>
                <div class="row">
                    @foreach ($redesSociales as $redSocial)
                        <div class="col-md-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="redes_sociales_{{ $redSocial }}" name="redes_sociales[]" value="{{ $redSocial }}"
                                @if (in_array($redSocial, $redesSocialesSeleccionadas)) checked @endif>
                                <label class="form-check-label" for="redes_sociales_{{ $redSocial }}">{{ $redSocial }}</label>
                                @if (in_array($redSocial, $redesSocialesSeleccionadas))
                                    <input type="text" class="form-control mt-2" id="url_{{ $redSocial }}" name="redes_sociales_urls[{{ $redSocial }}]" value="{{ $redesSocialesSeleccionadas[$redSocial] }}">
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
            {{-- <div class="form-group">
                <label for="redes_sociales">Redes Sociales:</label>
                <div class="row">
                    @foreach ($redesSociales as $redSocial)
                        <div class="col-md-2">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="redes_sociales_{{ $redSocial }}" name="redes_sociales[]" value="{{ $redSocial }}" @if (in_array($redSocial, $redesSocialesSeleccionadas)) checked @endif>
                                <label class="form-check-label" for="redes_sociales_{{ $redSocial }}">{{ ucfirst($redSocial) }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div> --}}      
            <div class="col-lg-12 mt-5">
                <button type="submit" class="btn btn-primary ">Guardar</button>
                <a href="{{ route('menuen.index') }}" class="btn btn-secondary float-right">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
