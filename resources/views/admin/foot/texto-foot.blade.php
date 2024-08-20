@extends('admin.admin')
@section('contenido')
    <h1>Editar texto del pie de página</h1>
    @if (session('success'))
    <div class="col-lg-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
           Texto actualizado correctamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    @endif
    <form action="{{ route('update.footer.text') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="text">Texto del pie de página:</label>
            <textarea id="text" name="text" class="form-control ckeditor">{{ $footerText->text ?? '' }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
