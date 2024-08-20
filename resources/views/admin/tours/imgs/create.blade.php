@extends('admin.admin')
@section('titulo', 'Crear Tour en Ingles')
@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            <h3>Crear nueva imagen:</h3>
        </div>
        <div class="col-lg-12">
            <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <input type="file" id="imageInput" name="img" accept="image/*" required>
                        @error('img')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>                    
                    <div class="col-lg-4 mt-3">
                        <div id="imagePreview">                            
                        </div>
                    </div>
                    <div class="col-lg-12 mt-3">
                        <button type="submit" class="btn btn-sm btn-primary">Subir img</button>
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
