@extends('admin.admin')
@section('titulo', 'Lista de destinos en Ingles')
@section('contenido')
    <div class="row">
        <div class="col-12 mt-2">
            <div class="row">
                <div class="col-6 float-left">
                    <h3>Crear nuevo Destino en Inglés:</h3>
                </div>
                <div class="col-6">
                    <a href="{{ route('destinies.index') }}" class="btn btn-primary btn-sm float-right mr-2">Cancelar</a>
                </div>
                <div class="col-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('destinies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" class="form-control form-control-sm" required value="{{ old('nombre') }}">
                    @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="img">Imagen:</label>
                            <input type="file" name="img" class="form-control form-control-sm"
                                required id="imgInput">
                            @error('img')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div id="imagePreview"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="imgThumb">Imagen Thumbnail:</label>
                            <input type="file" name="imgThumb" class="form-control form-control-sm"
                                required id="imgThumbInput">
                            @error('imgThumb')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div id="imageThumbPreview"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" class="ckeditor form-control form-control-sm" required value="{{ old('descripcion') }}"></textarea>
                    @error('descripcion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="slug">Slug:</label>
                    <input type="text" name="slug" id="slugInput" class="form-control form-control-sm" required value="{{ old('slug') }}">
                    @error('slug')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
            </form>
        </div>
    </div>
    <script>
        const slugInput = document.getElementById('slugInput');

        slugInput.addEventListener('keyup', function(event) {
            const previousValue = this.value;
            const newValue = previousValue.replace(/\s+/g, '-');
            this.value = newValue;
        });
    </script>
    <script>
        document.getElementById('imgInput').addEventListener('change', function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var imagePreview = document.getElementById('imagePreview');
                imagePreview.innerHTML = '';

                var img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth= '100%';
                img.style.objectFit = 'cover';

                imagePreview.appendChild(img);
            };

            reader.readAsDataURL(file);
        });

        document.getElementById('imgThumbInput').addEventListener('change', function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var imageThumbPreview = document.getElementById('imageThumbPreview');
                imageThumbPreview.innerHTML = '';

                var img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '100%';
                img.style.objectFit = 'cover';

                imageThumbPreview.appendChild(img);
            };

            reader.readAsDataURL(file);
        });
    </script>
@endsection
