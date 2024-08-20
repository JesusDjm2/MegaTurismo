<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link rel="icon" href="{{ asset('img/icono-mega-turismo.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    {{-- <link rel="stylesheet" href="css/style.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container-fluid">
        <div class="row info align-items-center">
            <div class="col-lg-6 text-center">
                @if (!empty($contacto->correo1))
                    <span class="infoMail"> {{ $contacto->correo1 }}</span>
                @endif
                <span class="responsive">|</span>
                @if (!empty($contacto->correo2))
                    <span class="infoMail2"> {{ $contacto->correo2 }}</>
                @endif
            </div>
            <div class="col-lg-6 redesContent">
                <span class="fa fa-whatsapp redes"></span>
                <span class="fa fa-pinterest redes"></span>
                <span class="fa fa-tripadvisor redes"></span>
                <span class=" fa fa-instagram redes"></span>
                <span class="fa fa-facebook redes"></span>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}">
                <img src="{{ asset('img/logo-mega-turismo-2.png') }}" width="120px" id="logo-image"
                    alt="Logo Mega Turismo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active dropdown">
                        <a class="nav-link dropdown-toggle-split" href="{{ route('destinies') }}"
                            id="dropdownDestinations" onmouseover="toggleDropdown(true)" onclick="redirect()">
                            Destinations <span class="fa fa-caret-down caret"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownDestinations"
                            onmouseover="toggleDropdown(true)" onmouseout="toggleDropdown(false)">
                            @foreach ($destinos as $destino)
                                <a class="dropdown-item"
                                    href="{{ route('destinies.show', $destino->slug) }}">{{ $destino->nombre }}</a>
                            @endforeach
                        </div>
                        <script>
                            var dropdownOpen = false;
                            function toggleDropdown(isOpen) {
                                var dropdownMenu = document.getElementsByClassName('dropdown-menu')[0];
                                if (isOpen) {
                                    dropdownMenu.classList.add('show');
                                    dropdownOpen = true;
                                } else if (!isOpen && !dropdownMenu.matches(':hover')) {
                                    dropdownMenu.classList.remove('show');
                                    dropdownOpen = false;
                                }
                            }
                            function redirect() {
                                if (!dropdownOpen) {
                                    window.location.href = "{{ route('destinies') }}";
                                }
                            }
                        </script>

                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('packages') }}">Peru Packages</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('adventures') }}">Peru Adventure</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('gastronomy') }}">Peru Gastronomy</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('spiritual') }}">Spiritual</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('blogen') }}">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href=""><img src="{{ asset('img/es.webp') }}"
                                width="25px" alt="Bandera español" title="Español"></a></li>
                </ul>
                <form action="{{ route('search') }}" class="searchMenu" method="GET">
                    <input type="text" name="searchTerm" placeholder="Search tour" class="input">
                    <button class="fa fa-search " type="submit">
                    </button>
                </form>
            </div>
        </div>
    </nav>

    @yield('contenido')
    <div class="container-fluid bg-dark">
        <div class="container">
            <div class="row links">
                <div class="col-lg-3">
                    <div class="text-center">
                        <img src="{{ asset('img/logo-mega-turismo-blanco.png') }}" width="100px"
                            alt="Logo Mega Turismo blanco" loading="lazy">
                    </div>
                    <p class="mt-3">
                        {!! $footerText->text !!}
                    </p>
                    <div class="sociales">
                        <a href=""><span class="fa fa-whatsapp redes"></span></a>
                        <a href=""><span class="fa fa-pinterest redes"></span></a>
                        <a href=""><span class="fa fa-tripadvisor redes"></span></a>
                        <a href=""><span class=" fa fa-instagram redes"></span></a>
                        <a href=""><span class="fa fa-facebook redes"></span></a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Destinies</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <ul>
                                @foreach ($destinos->take(6) as $destino)
                                    <li><span>·</span><a href="{{ route('destinies.show', $destino->slug) }}">
                                            {{ $destino->nombre }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul>
                                @foreach ($destinos->skip(6)->take(6) as $destino)
                                    <li><span>·</span><a href="{{ route('destinies.show', $destino->slug) }}">
                                            {{ $destino->nombre }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Query</h4>
                    <ul>
                        @foreach ($vistas as $vista) 
                            <li><span>·</span>
                                <a href="{{ route('query.show', $vista->slug) }}">
                                    {{ $vista->nombre }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-3 sociales">
                    <h4>Contact Us</h4>
                    <ul class="contact">
                        @if (!empty($contacto->correo1))
                            <li><i class="fa fa-envelope"></i> {{ $contacto->correo1 }}</li>
                        @endif

                        @if (!empty($contacto->correo2))
                            <li><i class="fa fa-envelope"></i> {{ $contacto->correo2 }}</li>
                        @endif

                        @if (!empty($contacto->telefono1))
                            <li><i class="fa fa-whatsapp"></i> {{ $contacto->telefono1 }}</li>
                        @endif

                        @if (!empty($contacto->telefono2))
                            <li><i class="fa fa-whatsapp"></i> {{ $contacto->telefono2 }}</li>
                        @endif

                        @if (!empty($contacto->address))
                            <li><i class="fa fa-map-marker"></i> {{ $contacto->address }}</li>
                        @endif

                        @if (!empty($contacto->address2))
                            <li><i class="fa fa-map-marker"></i> {{ $contacto->address2 }}</li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center derechos">
                    <p>Todos los derechos reservados © | MegaTurismo 2023 | Creado por <a href="https://www.facebook.com/DjmWebMaster"
                            class="djm2" target="_blank" rel="noopener noreferrer">DJM2</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(window).scroll(function() {
            if ($(this).scrollTop() > 160) {
                $('#logo-image').attr('src', '{{ asset('img/logo-mega-turismo-2.png') }}')
                    .css({
                        'width': '100px',
                        'transition': 'width 0.6s'
                    });
            } else {
                $('#logo-image').attr('src', '{{ asset('img/logo-mega-turismo-2.png') }}')
                    .css({
                        'width': '120px',
                        'transition': 'width 0.6s'
                    });
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

</body>

</html>
