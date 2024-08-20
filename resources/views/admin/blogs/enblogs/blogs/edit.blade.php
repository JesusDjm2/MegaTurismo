@extends('admin.admin')
@section('titulo', 'Crear nuevo blog en inglés')
@section('contenido')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar Blog {{ $blog->nombre }}</span>
                        <a href="{{ route('enblogs.index') }}" class="btn btn-primary btn-sm" style="float: right">Volver</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('enblogs.update', $blog->id) }}" role="form">
                            @method('PUT')
                            @csrf
                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" name="nombre" id="nombre"
                                            class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}"
                                            value="{{ old('nombre', $blog->nombre ?? '') }}" placeholder="Nombre">
                                        @if ($errors->has('nombre'))
                                            <div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="resumen">Resumen:</label>
                                        <input type="text" name="resumen" id="resumen"
                                            class="form-control{{ $errors->has('resumen') ? ' is-invalid' : '' }}"
                                            value="{{ old('resumen', $blog->resumen ?? '') }}" placeholder="Resumen"
                                            maxlength="160">
                                        @if ($errors->has('resumen'))
                                            <div class="invalid-feedback">{{ $errors->first('resumen') }}</div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="descripcion">Contenido:</label>
                                        <textarea name="descripcion" id="descripcion"
                                            class="ckeditor form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}">{{ old('descripcion', $blog->descripcion ?? '') }}</textarea>
                                        @if ($errors->has('descripcion'))
                                            <div class="invalid-feedback">{{ $errors->first('descripcion') }}</div>
                                        @endif
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="img">Imagen Thumb:</label>
                                                <input type="file" name="imgThumb" id="img"
                                                    class="form-control{{ $errors->has('img') ? ' is-invalid' : '' }}">
                                                @if ($errors->has('imgThumb'))
                                                    <div class="invalid-feedback">{{ $errors->first('img') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="img">Imagen Fondo:</label>
                                                <input type="file" name="imgBig" id="img"
                                                    class="form-control{{ $errors->has('img') ? ' is-invalid' : '' }}">
                                                @if ($errors->has('imgBig'))
                                                    <div class="invalid-feedback">{{ $errors->first('img') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="keyword">Keywords:</label>
                                        <input type="text" name="keyword" id="keyword"
                                            class="form-control{{ $errors->has('keyword') ? ' is-invalid' : '' }}"
                                            value="{{ old('keyword', $blog->keyword ?? '') }}" placeholder="Keywords">
                                        @if ($errors->has('keyword'))
                                            <div class="invalid-feedback">{{ $errors->first('keyword') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="tags">Tags:</label><br>
                                        @foreach ($tags as $tag)
                                            <div class="form-check form-check-inline">
                                                <input type="checkbox" name="tags[]" id="tag_{{ $tag->id }}"
                                                    value="{{ $tag->id }}" class="form-check-input"
                                                    {{ in_array($tag->id, $blog->tags->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                <label for="tag_{{ $tag->id }}"
                                                    class="form-check-label">{{ $tag->nombre }}</label>
                                            </div>
                                        @endforeach
                                        @if ($errors->has('tags'))
                                            <div class="invalid-feedback">{{ $errors->first('tags') }}</div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="slug">Slug:</label>
                                        <input type="text" name="slug" id="slug" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" value="{{ old('slug', $blog->slug ?? '') }}" placeholder="Slug" onkeyup="replaceSpaces(this)">
                                        @if ($errors->has('slug'))
                                            <div class="invalid-feedback">{{ $errors->first('slug') }}</div>
                                        @endif
                                    </div>                                    

                                    <script>
                                        function replaceSpaces(input) {
                                            var value = input.value;
                                            var replaced = value.replace(/ /g, '-').replace(/[-]{2,}/g, '-');
                                            input.value = replaced;
                                        }
                                    </script>

                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            ClassicEditor.create(document.querySelector('.ckeditor')).catch(error => {
                                                console.error(error);
                                            });
                                        });
                                    </script>
                                </div>

                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
