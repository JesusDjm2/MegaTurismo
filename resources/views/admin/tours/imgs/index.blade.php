@extends('admin.admin')
@section('titulo', 'Crear Tour en Ingles')
@section('contenido')
    <div class="row">
        <div class="col-lg-6">
            <h3>Base de datos de Imagenes:</h3>
        </div>
        <div class="col-lg-6">
            <a href="{{ route('images.create') }}" class="float-right btn btn-sm btn-primary">Nueva Imagen</a>
        </div>
        <div class="col-lg-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        <div class="col-lg-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>URL</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($images as $image)
                        <tr>
                            <td>{{ $image->id }}</td>
                            <td><img src="{{ asset('img/imagenes/' . $image->img) }}" alt="Image" width="120px"></td>
                            <td>{{ asset('img/imagenes/' . $image->img) }}
                                <button class="btn btn-info btn-sm copy-url-btn"
                                    data-url="{{ asset('img/imagenes/' . $image->img) }}">
                                    Copiar URL
                                </button>
                            </td>
                            <td>
                                <a href="{{ route('images.edit', $image->id) }}" class="btn btn-primary btn-sm"
                                    title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('images.destroy', $image->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const copyUrlButtons = document.querySelectorAll('.copy-url-btn');

            copyUrlButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const url = this.getAttribute('data-url');
                    const tempInput = document.createElement('input');
                    document.body.appendChild(tempInput);
                    tempInput.value = url;
                    tempInput.select();
                    document.execCommand('copy');
                    document.body.removeChild(tempInput);
                    alert('URL copiada al portapapeles: ' + url);
                });
            });
        });
    </script>

@endsection
