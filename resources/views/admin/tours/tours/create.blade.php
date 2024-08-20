@extends('admin.admin')
@section('titulo', 'Crear Tour en Ingles')
@section('contenido')
    <div class="row">
        <div class="col-lg-12">
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
        <div class="col-12 mt-2">
            <div class="row" style="padding: 1em; border-radius: 10px;">
                <div class="col-lg-6 float-left">
                    <h4>Crear Nuevo Tour en español</h4>
                </div>
                <div class="col-lg-6">
                    <a href="{{route('tours.index')}}" class="btn btn-primary float-right">Volver</a>
                </div>
            </div>
            <form action="{{ route('tours.store') }}" method="post" enctype="multipart/form-data" class="bg-light">
                @csrf
                <div class="row">
                    <div class="col-lg-12 mt-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control form-control-sm" name="nombre" id="nombre"
                            value="{{ old('nombre', isset($tour) ? $tour->nombre : '') }}" required>
                        @error('nombre')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-12 mt-3">
                        <label for="descripcion">Descripción</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control form-control-sm"
                            value="{{ old('descripcion', isset($tour) ? $tour->descripcion : '') }}" required maxlength="150">
                        @error('descripcion')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-3 mt-3">
                        <label for="precioReal">Precio Real</label>
                        <input type="number" name="precioReal" class="form-control form-control-sm" id="precioReal"
                            value="{{ old('precioReal', isset($tour) ? $tour->precioReal : '') }}" required>
                        @error('precioReal')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-3 mt-3">
                        <label for="precioPublicado">Precio Publicado</label>
                        <input type="number" name="precioPublicado" class="form-control form-control-sm"
                            id="precioPublicado"
                            value="{{ old('precioPublicado', isset($tour) ? $tour->precioPublicado : '') }}" required>
                        @error('precioPublicado')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-3 mt-3">
                        <label for="dias">Días:</label>
                        <input type="number" name="dias" class="form-control form-control-sm" id="dias"
                            value="{{ old('dias', isset($tour) ? $tour->dias : '') }}" required>
                        @error('dias')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-3 mt-3">
                        <label for="dificultad">Dificultad:</label>
                        <select name="dificultad" class="form-control form-control-sm" id="dificultad" required>
                            <option value="facil"
                                {{ old('dificultad', isset($tour) ? $tour->dificultad : '') == 'facil' ? 'selected' : '' }}>
                                Fácil</option>
                            <option value="moderado"
                                {{ old('dificultad', isset($tour) ? $tour->dificultad : '') == 'moderado' ? 'selected' : '' }}>
                                Moderado</option>
                            <option value="dificil"
                                {{ old('dificultad', isset($tour) ? $tour->dificultad : '') == 'dificil' ? 'selected' : '' }}>
                                Difícil</option>
                        </select>
                        @error('dificultad')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-4 mt-3">
                        <label for="categoria">Categoría:</label>
                        <select name="categoria_id" id="categoria" class="form-control form-control-sm" required>
                            @foreach ($categorias as $id => $nombre)
                                <option value="{{ $id }}">{{ $nombre }}</option>
                            @endforeach
                        </select>
                        @error('categoria')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-4 mt-3">
                        <label for="lugarInicio">Lugar de inicio</label>
                        <input type="text" name="lugarInicio" class="form-control form-control-sm" id="lugarInicio"
                            value="{{ old('lugarInicio', isset($tour) ? $tour->lugarInicio : '') }}">
                        @error('lugarInicio')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-4 mt-3">
                        <label for="lugarFin">Lugar de fin</label>
                        <input type="text" name="lugarFin" class="form-control form-control-sm" id="lugarFin"
                            value="{{ old('lugarFin', isset($tour) ? $tour->lugarFin : '') }}">
                        @error('lugarFin')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-4 mt-3">
                        <label for="imgThumb">Imagen Thumbnail</label>
                        <input type="file" name="imgThumb" class="form-control form-control-sm" id="imgThumb" required>
                        @error('imgThumb')
                            <div>{{ $message }}</div>
                        @enderror
                        <img id="imgThumbPrev" style="max-width:100%; object-fit: cover;">
                    </div>
                    <div class="col-lg-4 mt-3">
                        <label for="img">Imagen principal</label>
                        <input type="file" name="img" class="form-control form-control-sm" id="img" required>
                        @error('img')
                            <div>{{ $message }}</div>
                        @enderror
                        <img id="imgPrev" style="max-width:100%; object-fit: cover;">
                    </div>
                    <div class="col-lg-4 mt-3">
                        <label for="mapa">Mapa</label>
                        <input type="file" class="form-control form-control-sm" name="mapa" id="mapa">
                        @error('mapa')
                            <div>{{ $message }}</div>
                        @enderror
                        <img id="imgMapaPrev" style="max-width:100%; object-fit: cover;">
                    </div>
                    <div class="form-group mt-3">
                        <label for="galeria">Imágenes de la galería:</label>
                        <input type="file" class="form-control form-control-sm" name="galeria[]" id="galeria"
                            multiple>
                        @error('galeria')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="separador"> </div>

                    <div class="col-lg-12 mt-3">
                        <label for="fechas">Cantidad de Fechas y Precios:</label>
                        <input type="number" class="form-control form-control-sm" name="fechas" id="fechas"
                            min="0">
                        @error('fechas')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div id="fechas-container" class="mt-3 col-12">
                    </div>
                    <script>
                        document.getElementById('fechas').addEventListener('input', function() {
                            var cantidadFechas = parseInt(this.value);
                            var fechasContainer = document.getElementById('fechas-container');
                            fechasContainer.innerHTML = '';
                            for (var i = 1; i <= cantidadFechas; i++) {
                                var row = document.createElement('div');
                                row.classList.add('row', 'mb-3');

                                var colWrapper = document.createElement('div');
                                colWrapper.classList.add('col-2');

                                var fechaParagraph = document.createElement('p');
                                fechaParagraph.classList.add('font-weight-bold');
                                fechaParagraph.textContent = 'Fecha ' + i + ':';
                                colWrapper.appendChild(fechaParagraph);
                                row.appendChild(colWrapper);
                                var colWrapper2 = document.createElement('div');
                                colWrapper2.classList.add('col-5');

                                var fechaInput = document.createElement('input');
                                fechaInput.type = 'date';
                                fechaInput.name = 'fechas[' + i + '][fecha]';
                                fechaInput.required = true;
                                fechaInput.classList.add('form-control', 'form-control-sm');
                                colWrapper2.appendChild(fechaInput);
                                row.appendChild(colWrapper2);
                                var colWrapper3 = document.createElement('div');
                                colWrapper3.classList.add('col-5');
                                var precioInput = document.createElement('input');
                                precioInput.type = 'number';
                                precioInput.name = 'fechas[' + i + '][precio]';
                                precioInput.step = '0.01';
                                precioInput.required = true;
                                precioInput.placeholder = 'Agregar precio ' + i;
                                precioInput.classList.add('form-control', 'form-control-sm');
                                colWrapper3.appendChild(precioInput);

                                row.appendChild(colWrapper3);

                                fechasContainer.appendChild(row);
                            }
                        });
                    </script>

                    <!-----hoteles------------>
                    <div class="col-lg-12 mt-3">
                        <label for="hoteles">Cantidad de Hoteles:</label>
                        <input type="number" class="form-control form-control-sm" name="hoteles" id="hoteles"
                            min="0">
                        @error('hoteles')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div id="hoteles-container" class="mt-3 col-12">
                    </div>

                    <script>
                        document.getElementById('hoteles').addEventListener('input', function() {
                            var cantidadHoteles = parseInt(this.value);
                            var hotelesContainer = document.getElementById('hoteles-container');
                            hotelesContainer.innerHTML = '';
                            for (var i = 1; i <= cantidadHoteles; i++) {
                                var hotelRow = document.createElement('div');
                                hotelRow.classList.add('row', 'mb-3');

                                var colWrapper1 = document.createElement('div');
                                colWrapper1.classList.add('col-1');

                                var label = document.createElement('label');
                                label.textContent = 'Hotel ' + i + ':';
                                label.classList.add('font-weight-bold', 'align-middle');
                                colWrapper1.appendChild(label);
                                hotelRow.appendChild(colWrapper1);
                                var colWrapper2 = document.createElement('div');
                                colWrapper2.classList.add('col-2');

                                var hotelNameInput = document.createElement('input');
                                hotelNameInput.type = 'text';
                                hotelNameInput.name = 'hoteles[' + i + '][nombre]';
                                hotelNameInput.required = true;
                                hotelNameInput.placeholder = 'Nombre del hotel ' + i;
                                hotelNameInput.classList.add('form-control', 'form-control-sm');
                                colWrapper2.appendChild(hotelNameInput);

                                hotelRow.appendChild(colWrapper2);

                                var colWrapper3 = document.createElement('div');
                                colWrapper3.classList.add('col-2');

                                var hotelLocationInput = document.createElement('input');
                                hotelLocationInput.type = 'text';
                                hotelLocationInput.name = 'hoteles[' + i + '][ubicacion]';
                                hotelLocationInput.required = true;
                                hotelLocationInput.placeholder = 'Ubicación del hotel ' + i;
                                hotelLocationInput.classList.add('form-control', 'form-control-sm');
                                colWrapper3.appendChild(hotelLocationInput);

                                hotelRow.appendChild(colWrapper3);

                                var colWrapper4 = document.createElement('div');
                                colWrapper4.classList.add('col-4');

                                var hotelDescriptionInput = document.createElement('textarea');
                                hotelDescriptionInput.name = 'hoteles[' + i + '][descripcion]';
                                hotelDescriptionInput.required = true;
                                hotelDescriptionInput.placeholder = 'Descripción del hotel ' + i;
                                hotelDescriptionInput.classList.add('form-control', 'form-control-sm');
                                colWrapper4.appendChild(hotelDescriptionInput);
                                hotelRow.appendChild(colWrapper4);
                                var colWrapper5 = document.createElement('div');
                                colWrapper5.classList.add('col-2');
                                var hotelImageInput = document.createElement('input');
                                hotelImageInput.type = 'file';
                                hotelImageInput.name = 'hoteles[' + i + '][img]';
                                hotelImageInput.required = true;
                                hotelImageInput.accept = 'image/*';
                                hotelImageInput.classList.add('form-control-file');
                                colWrapper5.appendChild(hotelImageInput);

                                hotelRow.appendChild(colWrapper5);

                                hotelesContainer.appendChild(hotelRow);
                            }
                        });
                    </script>
                    <div class="col-lg-12 mt-3">
                        <label for="resumen">Resumen:</label>
                        <textarea name="resumen" id="resumen" class="ckeditor form-control" required>{{ old('resumen', isset($tour) ? $tour->resumen : '') }}</textarea>
                        @error('resumen')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-12 mt-3">
                        <label for="detallado">itinerario:</label>
                        <textarea name="detallado" class="ckeditor form-control" id="detallado" required>{{ old('detallado', isset($tour) ? $tour->detallado : '') }}</textarea>
                        @error('detallado')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label for="incluidos">Incluidos</label>
                        <textarea name="incluidos" id="incluidos" class="ckeditor form-control" required>{{ old('incluidos', isset($tour) ? $tour->incluidos : '') }}</textarea>
                        @error('incluidos')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label for="importante">Importante</label>
                        <textarea name="importante" class="ckeditor form-control" id="importante">{{ old('importante', isset($tour) ? $tour->importante : '') }}</textarea>
                        @error('importante')
                            <div>{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="col-lg-12">
                        <label for="keywords">Palabras clave</label>
                        <input type="text" name="keywords" class="form-control form-control-sm" id="keywords"
                            value="{{ old('keywords', isset($tour) ? $tour->keywords : '') }}" required>
                        @error('keywords')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-12">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" class="form-control form-control-sm" id="slug"
                            value="{{ old('slug', isset($tour) ? $tour->slug : '') }}" required
                            oninput="replaceSpaces(this)">
                        @error('slug')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <script>
                        function replaceSpaces(input) {
                            var value = input.value;
                            var replaced = value.replace(/ /g, '-').replace(/[-]{2,}/g, '-');
                            input.value = replaced;
                        }
                    </script>
                    <a href="{{ route('tours.index') }}" class="btn btn-secondary mt-4">Cancelar</a>
                    <button class="btn btn-primary mt-4 ml-4" type="submit">Guardar</button>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        CKEDITOR.replace('.ckeditor', {
            extraPlugins: 'youtube',
            toolbar: [
                ['Youtube']
            ]
        });
    </script>
    <script>
        const seleccionArchivosThumb = document.querySelector("#imgThumb");
        const imagenPrevisualizacionThumb = document.querySelector("#imgThumbPrev");
        seleccionArchivosThumb.addEventListener("change", () => {
            mostrarPrevisualizacion(seleccionArchivosThumb, imagenPrevisualizacionThumb);
        });

        const seleccionArchivosImg = document.querySelector("#img");
        const imagenPrevisualizacionImg = document.querySelector("#imgPrev");
        seleccionArchivosImg.addEventListener("change", () => {
            mostrarPrevisualizacion(seleccionArchivosImg, imagenPrevisualizacionImg);
        });

        const seleccionArchivosMapa = document.querySelector("#mapa");
        const imagenPrevisualizacionMapa = document.querySelector("#imgMapaPrev");
        seleccionArchivosMapa.addEventListener("change", () => {
            mostrarPrevisualizacion(seleccionArchivosMapa, imagenPrevisualizacionMapa);
        });

        function mostrarPrevisualizacion(input, imagen) {
            const archivos = input.files;
            if (!archivos || !archivos.length) {
                imagen.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            imagen.src = objectURL;
        }
    </script>

@endsection
