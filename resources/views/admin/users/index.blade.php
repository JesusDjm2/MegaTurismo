@extends('admin.admin')
@section('titulo', 'Usuarios registrados')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <h3 class="float-left mb-3">Lista de usuarios registrados:</h3>
            <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary float-right">Nuevo Usuario</a>
            @if (session('status'))
                <div class="text-success">
                    <h4>{{ session('status') }}</h4>
                </div>
            @endif
            <table class="table mt-4 table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-info">Editar</a>
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
