@extends('admin.admin')
@section('titulo', 'Editar Destino en Inglés')
@section('contenido')
    <div class="row">
        <div class="col-12 mt-2">
            <div class="row">
                <div class="col-6 float-left">
                    <h3>Editar Destino en Inglés:</h3>
                </div>
                <div class="col-6">
                    <a href="{{ route('destinies.index') }}" class="btn btn-primary btn-sm float-right mr-2">Cancelar</a>
                </div>
                <div class="col-lg-12">
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
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('destinies.update', $destino->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" class="form-control form-control-sm" value="{{ $destino->nombre }}"
                        required>
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
                            <input type="file" name="img" accept="image/*" class="form-control form-control-sm" id="imgInput">
                            @error('img')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="mt-2">
                                @if ($destino->img)
                                    <img id="imgFullPrev" src="{{ asset('img/destinos/' . $destino->img) }}" alt="Imagen Destino"
                                        style="max-width: 100%; object-fit: cover;">
                                @else
                                    <img id="imgFullPrev" src="{{ asset('placeholder.png') }}" alt="Imagen Destino"
                                        style="max-width: 100%; object-fit: cover;">
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            var imgInput = document.getElementById('imgInput');
                            var imgFullPrev = document.getElementById('imgFullPrev');
                    
                            imgInput.addEventListener('change', function () {
                                if (this.files && this.files[0]) {
                                    var reader = new FileReader();
                    
                                    reader.onload = function (e) {
                                        imgFullPrev.src = e.target.result;
                                    }
                    
                                    reader.readAsDataURL(this.files[0]);
                                }
                            });
                        });
                    </script>
                    
                    {{-- <div class="col-lg-6">
                        <div class="form-group">
                            <label for="img">Imagen:</label>
                            <input type="file" name="img" accept="image/*" class="form-control form-control-sm"
                                id="imgInput">
                            @error('img')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="mt-2">
                                @if ($destino->img)
                                    <img id="imgFullPrev" src="{{ asset('img/destinos/' . $destino->img) }}" alt="Imagen Destino"
                                        style="max-width: 100%; object-fit: cover;">
                                @endif
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="imgThumb">Imagen Thumbnail:</label>
                            <input type="file" name="imgThumb" class="form-control form-control-sm"
                                id="imgThumbInput">
                            @error('imgThumb')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="mt-2">
                                @if ($destino->imgThumb)
                                    <img id="previewThumb" src="{{ asset('img/destinos/thumbs/' . $destino->imgThumb) }}"
                                        style="max-width: 100%; object-fit: cover;">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" class="ckeditor form-control form-control-sm" required>{{ $destino->descripcion }}</textarea>
                    @error('descripcion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="slug">Slug:</label>
                    <input type="text" name="slug" id="slugInput" class="form-control form-control-sm"
                        value="{{ $destino->slug }}" required>
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
        document.addEventListener('DOMContentLoaded', function () {
            var imgThumbInput = document.getElementById('imgThumbInput');
            var previewThumb = document.getElementById('previewThumb');
    
            imgThumbInput.addEventListener('change', function () {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
    
                    reader.onload = function (e) {
                        previewThumb.src = e.target.result;
                    }
    
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>
    <script>
        const slugInput = document.getElementById('slugInput');

        slugInput.addEventListener('keyup', function(event) {
            const previousValue = this.value;
            const newValue = previousValue.replace(/\s+/g, '-');
            this.value = newValue;
        });
    </script>
@endsection
