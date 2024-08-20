<div class="form-group">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror" required
        value="{{ old('nombre', isset($comment) ? $comment->nombre : '') }}">
    @error('nombre')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="previewImg">Imagen:</label>
    <input type="file" id="previewImg" name="img" class="form-control @error('img') is-invalid @enderror">
    @error('img')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mt-2">
    @if ($comment && $comment->img)
        <img id="imgPreview" src="{{ asset( $comment->img) }}" alt="Imagen" style="max-width: 100%; height: auto;">
    @endif
</div>
<!-- Elemento para mostrar la imagen previsualizada -->
<img id="imgPreview" src="#" alt="Previsualización de la imagen"
    style="width: 400px; height: 260px; object-fit: cover; display: none;">

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const previewImg = document.getElementById("previewImg");
        const imgPreview = document.getElementById("imgPreview");

        previewImg.addEventListener("change", function() {
            const file = previewImg.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imgPreview.src = e.target.result;
                    imgPreview.style.display = "block";
                };

                reader.readAsDataURL(file);
            } else {
                imgPreview.src = "#";
                imgPreview.style.display = "none";
            }
        });
    });
</script>


{{-- <div class="form-group">
    <label for="img">Imagen:</label>
    <input type="file" id="img" name="img" class="form-control @error('img') is-invalid @enderror"
        accept="image/*">
    @error('img')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div> --}}

<div class="form-group">
    <label for="calificacion">Calificación:</label>
    <select id="calificacion" name="calificacion" class="form-control @error('calificacion') is-invalid @enderror"
        required>
        <option value="">Seleccionar Calificación</option>
        @for ($i = 1; $i <= 5; $i++)
            <option value="{{ $i }}"
                {{ old('calificacion', isset($comment) && $comment->calificacion == $i ? 'selected' : '') }}>
                {{ $i }}</option>
        @endfor
    </select>
    @error('calificacion')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="comentario">Comentario:</label>
    <textarea id="comentario" name="comentario" class="form-control @error('comentario') is-invalid @enderror">{{ old('comentario', isset($comment) ? $comment->comentario : '') }}</textarea>
    @error('comentario')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">Guardar</button>
<a href="{{ route('enreviews.index') }}" class="btn btn-secondary">Cancelar</a>
