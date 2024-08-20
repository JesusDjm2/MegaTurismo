<!DOCTYPE html>
<html>

<head>
    <title>Formulario de contacto para Mega Turismo</title>
</head>

<body>
    <div style="width: 100%; padding: 2em">
        <h1 style="color: darkcyan">Formulario de contacto</h1>
        <div style="width: 100%">
            <div style="width:50%">
                <p style="color: #222222; padding:1em"><strong>Nombre:</strong> {{ $nombre }}</p>
            </div>
            <div style="width: 50%">
                <p style="color: #222222; padding:1em"><strong>Teléfono:</strong> {{ $telefono }}</p>
            </div>
        </div>        
        <div style="width: 100%; height:1px; background: rgba(0, 0, 0, 0.103); margin-top:0.1em; margin-bottom:1em">
        </div>        
        <div style="width: 100%; height:1px; background: rgba(0, 0, 0, 0.103); margin-top:0.1em; margin-bottom:1em">
        </div>
        <p style="color: #222222"><strong>Email:</strong> {{ $email }}</p>
        <div style="width: 100%; height:1px; background: rgba(0, 0, 0, 0.103); margin-top:0.1em; margin-bottom:1em">
        </div>
        <p style="color: #222222"><strong>Fecha de Viaje:</strong> {{ $fechaViaje }}</p>
        <div style="width: 100%; height:1px; background: rgba(0, 0, 0, 0.103); margin-top:0.1em; margin-bottom:1em">
        </div>
        <p style="color: #222222"><strong>Tour:</strong> {{ $tour }}</p>
        <div style="width: 100%; height:1px; background: rgba(0, 0, 0, 0.103); margin-top:0.1em; margin-bottom:1em">
        </div>
        <p style="color: #222222"><strong>Adultos:</strong> {{ $cantidadAdultos }}</p>
        <div style="width: 100%; height:1px; background: rgba(0, 0, 0, 0.103); margin-top:0.1em; margin-bottom:1em">
        </div>
        <p style="color: #222222"><strong>Niños:</strong> {{ $cantidadNinos }}</p>
        <div style="width: 100%; height:1px; background: rgba(0, 0, 0, 0.103); margin-top:0.1em; margin-bottom:1em">
        </div>
        <p style="color: #222222"><strong>Mensaje:</strong> {{ $mensaje }}</p>
        <div style="width: 100%; height:1px; background: rgba(0, 0, 0, 0.103); margin-top:0.1em; margin-bottom:1em">
        </div>
    </div>
    <div style="margin-top: 2em; background:#000; width: 100%">
        <p style="text-align: center; color: #fff; text-decoration:none; padding:1em">
            Todos los derechos reservados Mega Turismo &copy; | Hecho por
            <a style="color: aqua; text-decoration: none" href="https://www.facebook.com/DjmWebMaster"
                target="_blank">DJM2</a>
        </p>
    </div>
    <style>
    </style>
</body>

</html>
