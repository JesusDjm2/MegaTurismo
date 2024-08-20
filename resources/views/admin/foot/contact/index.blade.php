@extends('admin.admin')
@section('titulo', 'Informacion de contacto')
@section('contenido')
    <div class="container-fluid">
        <div class="col-lg-12">
            <h5 style="display: inline-block">Contactos de pie de página</h5>
            <a href="{{ route('aboutus.create') }}" class="btn btn-primary btn-sm float-right">Crear Contacto</a>

        </div>
        <div class="col-lg-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        <div class="table-responsive">
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Correo 1</th>
                        <th>Correo 2</th>
                        <th>Teléfono 1</th>
                        <th>Teléfono 2</th>
                        <th>Dirección</th>
                        <th>Dirección 2</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($footContacts as $footContact)
                        <tr>
                            <td>{{ $footContact->correo1 }}</td>
                            <td>{{ $footContact->correo2 }}</td>
                            <td>{{ $footContact->telefono1 }}</td>
                            <td>{{ $footContact->telefono2 }}</td>
                            <td>{{ $footContact->address }}</td>
                            <td>{{ $footContact->address2 }}</td>
                            <td>
                                <a href="{{ route('aboutus.edit', $footContact->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('aboutus.show', $footContact->id) }}" class="btn btn-success btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <form action="{{ route('aboutus.destroy', $footContact->id) }}" method="POST"
                                    style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
