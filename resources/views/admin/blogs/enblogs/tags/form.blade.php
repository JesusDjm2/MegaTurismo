<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre"
                class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }} form-control-sm"
                value="{{ old('nombre', $tag->nombre ?? '') }}" placeholder="Nombre">
            @if ($errors->has('nombre'))
                <div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
            @endif
        </div>

        <div class="form-group">
            <label for="slug">Slug:</label>
            <input type="text" name="slug" id="slug"
                class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }} form-control-sm"
                value="{{ old('slug', $tag->slug ?? '') }}" readonly>
            @if ($errors->has('slug'))
                <div class="invalid-feedback">{{ $errors->first('slug') }}</div>
            @endif
        </div>

        <script>
            const nombreInput = document.getElementById('nombre');
            const slugInput = document.getElementById('slug');

            nombreInput.addEventListener('input', () => {
                const nombreSlug = nombreInput.value.trim().replace(/\s+/g, '-');
                slugInput.value = nombreSlug;
            });
        </script>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
        <a href="{{ route('entags.index') }}" class="btn btn-danger btn-sm float-right">Cancelar</a>
    </div>
</div>
