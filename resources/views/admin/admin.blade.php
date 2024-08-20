<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="nofollow">
    <title>@yield('titulo')</title>
    <link rel="shortcut icon" href="#">
    <link rel="icon" href="{{ asset('img/icono-mega-turismo.png') }}" type="image/png">
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/thumb/favicon-admin.png') }}" />
</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion mb-4" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/" target="_blank">
                <img src="{{ asset('img/logo-mega-turismo-blanco.png') }}" width="30%" alt="">
            </a>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Inglés
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ingles"
                    aria-expanded="false" aria-controls="ingles">
                    <i class="fas fa-fw fa-language"></i>
                    <span>Tours EN</span>
                </a>
                <div id="ingles" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar"
                    style="">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('cats.index') }}">
                            Categorias
                        </a>
                        <a class="collapse-item" href="{{ route('tours.index') }}">
                            Tours inglés
                        </a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="{{route('destinies.index')}}">
                    <i class="fas fa-fw fa-map"></i>
                    <span>Destinies</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#engblogs"
                    aria-expanded="false" aria-controls="engblogs">
                    <i class="fas fa-fw fa-pen"></i>
                    <span>Blogs EN</span>
                </a>
                <div id="engblogs" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar"
                    style="">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('entags.index') }}">
                            Tags
                        </a>
                        <a class="collapse-item" href="{{ route('enblogs.index') }}">
                            Blogs
                        </a>
                    </div>
                </div>
            </li>              
            <hr class="sidebar-divider d-none d-md-block">      
            <li class="nav-item">
                <a class="nav-link" href="{{ route('menuen.index') }}">
                    <i class="fas fa-fw fa-bars"></i>
                    <span>Menu</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block"> 
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#enmenu"
                    aria-expanded="false" aria-controls="engblogs">
                    <i class="fas fa-fw fa-list-ol"></i>
                    <span>Foot</span>
                </a>
                <div id="enmenu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar"
                    style="">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('edit.footer.text') }}">
                            Texto pie de página
                         </a>
                        <a class="collapse-item" href="{{ route('nosotros.index') }}">
                           Nosotros
                        </a>
                        <a class="collapse-item" href="{{ route('aboutus.index') }}">
                            Contacto
                         </a>
                    </div>
                </div>
            </li>    
            
            <div class="sidebar-heading">
                Español
            </div>
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#espanol"
                    aria-expanded="false" aria-controls="espanol">
                    <i class="fas fa-fw fa-language"></i>
                    <span>Tours ES</span>
                </a>
                <div id="espanol" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar"
                    style="">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('cats.index') }}">
                            Categorias
                        </a>
                        <a class="collapse-item" href="{{ route('tours.index') }}">
                            Tours inglés
                        </a>
                        <a class="collapse-item" href="">
                            Destinos ES
                        </a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('enreviews.index') }}">
                    <i class="fas fa-fw fa-comment"></i>
                    <span>Comments</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('images.index') }}">
                    <i class="fas fa-fw fa-image"></i>
                    <span>Imagenes</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Usuarios</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item no-arrow mx-1">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link mr-4" href="#" role="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                                </li>
                                <li>
                                    <a class="btn btn-danger mt-3 btn-sm" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    @yield('contenido')
                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Made by <a href="https://www.facebook.com/DjmWebMaster" target="_blank" rel="noopener noreferrer">DJM2</a></span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="//cdn.ckeditor.com/4.14.1/plugins/youtube/plugin.js"></script>
    <script src="//cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script>

    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('admin/js/demo/chart-pie-demo.js') }}"></script>

</body>

</html>
