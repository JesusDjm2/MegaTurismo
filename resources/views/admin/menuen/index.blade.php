@extends('admin.admin')

@section('titulo', 'Menu Inglés')

@section('contenido')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Menú en Inglés</h1>
                <a href="{{ route('menuen.create') }}" class="btn btn-primary btn-sm float-right">Crear Menu</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Correo 1</th>
                        <th>Correo 2</th>
                        <th>Redes Sociales</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($textos as $menu)
                        <tr>
                            <td>{{ $menu->correo1 }}</td>
                            <td>{{ $menu->correo2 }}</td>
                            <td>
                                @foreach ($menu->redes_sociales_array as $redSocial)
                                    <div class="mb-4">
                                        <label for="{{ $redSocial }}">{{ ucfirst($redSocial) }}:</label>
                                        <input type="text" id="{{ $redSocial }}" name="{{ $redSocial }}"
                                            value="" class="form-control" placeholder="Ingresar URL">
                                        <button type="button" class="btn btn-sm btn-info mt-2"
                                            onclick="guardarValor('{{ $redSocial }}')">Guardar</button>
                                    </div>
                                @endforeach
                            </td>
                            <script>
                                function guardarValor(redSocial) {
                                    // Obtener el valor ingresado en el input
                                    var valorIngresado = document.getElementById(redSocial).value;
                                    document.getElementById(redSocial).readOnly = true;
                                    document.getElementById(redSocial).value = valorIngresado;
                                }
                            </script>
                            <td>
                                <a href="{{ route('menuen.edit', $menu->id) }}" class="btn btn-primary">Editar</a>
                                <form action="{{ route('menuen.destroy', $menu->id) }}" method="POST"
                                    style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
