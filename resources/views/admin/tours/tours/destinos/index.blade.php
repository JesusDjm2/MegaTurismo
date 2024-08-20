@extends('admin.admin')
@section('titulo', 'Lista de destinos en Ingles')
@section('contenido')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <div class="row">
        <div class="col-12 mt-2">
            <div class="row">
                <div class="col-6 float-left">
                    <h3>Lista de Destinos en Inglés:</h3>
                </div>
                <div class="col-6">
                    <a href="{{ route('destinies.create') }}" class="btn btn-primary btn-sm float-right mr-2">Nuevo
                        Destino</a>
                </div>
                <div class="col-lg-12">
                    @if (session('status'))
                        <div class="text-success">
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="table-responsive">
                <table id="tabladatos" class="table mt-4 table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Imagen</th>
                            <th>Imagen Thumbnail</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($destinos as $destino)
                            <tr>
                                <td>{{ $destino->nombre }}</td>
                                <td>{!! $destino->descripcion !!}</td>
                                <td><img src="{{ asset('img/destinos/' . $destino->img) }}" width="80px" loading="lazy">
                                </td>
                                <td><img src="{{ asset('img/destinos/thumbs/' . $destino->imgThumb) }}" width="80px"
                                        loading="lazy"></td>
                                <td>
                                    <form action="{{ route('destinies.destroy', $destino->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('destinies.edit', $destino->id) }}" class="btn btn-info btn-sm"
                                            title="Editar">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('destinies.show', $destino->slug) }}" class="btn btn-success btn-sm" title="Ver Destino" target="_blank">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i
                                                class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
