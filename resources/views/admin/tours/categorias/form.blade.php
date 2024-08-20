<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" value="{{ old('nombre', $categoria->nombre) }}" placeholder="Nombre">
            @if ($errors->has('nombre'))
                <div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="slug">Slug:</label>
            <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug', $categoria->slug) }}" readonly>
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
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>