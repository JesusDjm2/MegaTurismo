@extends('admin.admin')
@section('titulo', 'Crear nuevo comentario en inglés')
@section('contenido')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
<div class="row">
    <div class="col-12 mt-2">
        <div class="row">
            <div class="col-6 float-left">
                <h2>Lista comentarios en Inglés:</h2>
            </div>
            <div class="col-6">
                <a href="{{ route('enreviews.create') }}" class="btn btn-primary btn-sm float-right mr-2">Nuevo comentario</a>
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
        <div class="table-resposive">
            <table id="tabladatos" class="table mt-4 table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Calificación</th>
                        <th scope="col">Comentario</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td>{{ $comment->nombre }}</td>
                            <td><img src="{{ asset($comment->img) }}" width="120px"></td>
                            <td>
                                @for ($i = 1; $i <= $comment->calificacion; $i++)
                                    <span class="fa fa-star" style="color: #dddd1d"></span>
                                @endfor
                            </td>
                            <td>{{ $comment->comentario }}</td>
                            <td style="width: 140px">
                                <form action="{{ route('enreviews.destroy', $comment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('enreviews.edit', $comment->id) }}" class="btn btn-info btn-sm"
                                        title="Editar">
                                        <i class="fa fa-edit"></i>
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