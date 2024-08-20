@extends('admin.admin')
@section('titulo', 'Crear nuevo tour en español')
@section('contenido')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <div class="row">
        <div class="col-12 mt-2">
            <div class="row">
                <div class="col-6 float-left">
                    <h2>Lista de tours en Inglés:</h2>
                </div>
                <div class="col-6">
                    <a href="{{ route('tours.create') }}" class="btn btn-primary btn-sm float-right mr-2">Nuevo Tour</a>
                </div>
                @if (session('success'))
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @endif
            </div>
            <div class="table-resposive">
                <table id="tabladatos" class="table mt-4 table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Precios</th>
                            <th scope="col">Días</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Ubicación</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Dificultad</th>
                            <th>Galeria</th>
                            <th scope="col" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tours as $tour)
                            <tr>
                                <td>{{ $tour->id }}</td>
                                <td>{{ $tour->nombre }}</td>
                                <td><img src="{{ asset($tour->imgThumb) }}" width="120px"></td>
                                <td>
                                    - USD{{ $tour->precioReal }}<br>
                                    - USD{{ $tour->precioPublicado }}
                                </td>
                                <td>{{ $tour->dias }}</td>
                                <td>
                                    @foreach ($tour->categorias as $categoria)
                                        <li>{{ $categoria->nombre }}</li>
                                    @endforeach
                                </td>
                                <td>{{ $tour->lugarInicio }} → {{ $tour->lugarFin }}</td>
                                <td>{{ $tour->slug }}</td>
                                <td>{{ $tour->dificultad }}</td>
                                <td style="width: 160px">
                                    @foreach (explode(',', $tour->galeria) as $imagen)
                                        <img src="{{ asset($imagen) }}" alt="Galería" width="30px">
                                    @endforeach
                                </td>
                                <td style="width: 140px">
                                    <form action="{{ route('tours.destroy', $tour->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('tours.edit', $tour->id) }}" class="btn btn-info btn-sm"
                                            title="Editar">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('tour.show', ['slug' => $tour->slug]) }}"
                                            class="btn btn-success btn-sm" title="Ver tour" target="_blank">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        /*  $(document).ready(function() {
                            $('#tabladatos').DataTable();
                        }); */
        var j = jQuery.noConflict();
        j(document).ready(function() {
            j('#tabladatos').DataTable();
        });
    </script>
@endsection
