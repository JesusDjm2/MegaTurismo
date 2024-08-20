@extends('admin.admin')
@section('titulo', 'Crear Tour en Ingles')
@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            <h3>Editar imagen:</h3>
        </div>
        <div class="col-lg-12">
            <form action="{{ route('images.update', $img->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-12">
                        <input type="file" id="imageInput" name="img" accept="image/*" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-lg-4 mt-3">
                        <div id="imagePreview">
                            <img src="{{ asset('img/imagenes/' . $img->img) }}" alt="Imagen Actual" style="max-width: 100%; height: auto;">
                        </div>
                    </div>
                    <div class="col-lg-12 mt-3">
                        <button type="submit" class="btn btn-sm btn-primary">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('imageInput').addEventListener('change', function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var imagePreview = document.getElementById('imagePreview');
                imagePreview.innerHTML = '';

                var img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '100%';
                img.style.height = 'auto';

                imagePreview.appendChild(img);
            };

            reader.readAsDataURL(file);
        });
    </script>
@endsection
