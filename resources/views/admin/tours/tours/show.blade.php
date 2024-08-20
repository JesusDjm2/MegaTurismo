@extends('layouts.app')
@section('titulo', $tour->nombre)
@section('contenido')
@auth
    <a href="{{ route('tours.edit', $tour->id) }}" target="_blank" class="botonEdicion">Editar Tour</a>
@endauth
    <div class="container-fluid custom-container">
        <img src="{{ asset($tour->img) }}" alt="{{ $tour->nombre }}">
        <h1 class="title">{{ $tour->nombre }}</h1>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    <div class="mensaje d-flex align-items-center justify-content-center">
        <p>Texto de muestra generado automaticamente</p>
    </div>
    <div class="container-fluid toursDetails">
        <div class="row">
            <span>Days:<br>
                <span class="resaltado">{{ $tour->dias }}</span>
            </span>
            <span>Difficulty: <br>
                <span class="resaltado">{{ $tour->dificultad }}</span>
            </span>
            <span>Tour: <br>
                <span class="resaltado">
                    @foreach ($tour->categorias as $categoria)
                        {{ $categoria->nombre }}
                    @endforeach
                </span>
            </span>
            <span>Price: <del style="font-size: 14px">U${{ $tour->precioReal }}.00</del> <br>
                <span class="resaltado">U${{ $tour->precioPublicado }}.00</span>
            </span>
            <span>
                <a href="#dates" class="dates"><i class="fa fa-calendar"></i> Go to dates</a>
                <a class="book" id="bookBtn"><i class="fa fa-pencil"></i> Book</a>
            </span>
            <div class="popup modal lg" id="bookPopup">
                <div class="popup-content container">
                    <h3 class="text-center">Reserve trip</h3>
                    <form method="POST" action="{{ route('reservas') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre">Name:</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control form-control-sm"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="telefono">Phone:</label>
                                    <input type="tel" id="telefono" name="telefono"
                                        class="form-control form-control-sm" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="tel" id="email" name="email" class="form-control form-control-sm"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fechaViaje">Fecha de Viaje:</label>
                                    <input type="date" id="fechaViaje" name="fechaViaje"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tipoViaje">Tour:</label>
                                    <input type="text" id="tour" name="tour"
                                        value="{{ $tour->nombre }} → {{ $tour->dias }} days" readonly
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cantidadAdultos">Adults:</label>
                                    <input type="number" id="cantidadAdultos" name="cantidadAdultos"
                                        class="form-control form-control-sm" min="1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cantidadAdultos">Children:</label>
                                    <input type="number" id="cantidadAdultos" name="cantidadAdultos"
                                        class="form-control form-control-sm" min="1">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mensaje">Menssage:</label>
                            <textarea id="mensaje" name="mensaje" class="form-control form-control-sm" rows="4" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-sm">Enviar</button>
                        </div>
                    </form>
                    <button class="close close-btn" id="closeBtn"><i class="fa fa-times"></i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>{{ $tour->nombre }}</h4>
                    <p>{{ $tour->lugarInicio }} → {{ $tour->lugarFin }}</p>
                    <img src="{{ asset($tour->mapa) }}" alt="{{ $tour->nombre }}" width="100%">
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-5">
        <div class="row mt-4">
            <div class="col-lg-3">
                <div class="sticky">
                    <div class="image-container">
                        <img src="{{ asset($tour->mapa) }}" alt="{{ $tour->nombre }}" width="100%">
                        <a href="#" class="expand-icon" data-toggle="modal" data-target="#imageModal">
                            <i class="fa fa-expand"></i>
                        </a>
                    </div>
                    <div class="submenu">
                        <a href="#overview"><i class="fa fa-list"></i> Overview</a>
                        <a href="#galery"><i class="fa fa-image"></i> Gallery</a>
                        <a href="#itinerary"><i class="fa fa-map"></i> Itinerary</a>
                        <a href="#includes"><i class="fa fa-cart-plus"></i> Inclusions</a>
                        <a href="#dates"><i class="fa fa-calendar"></i> Dates & Availability</a>
                        <a href="#hotels"><i class="fa fa-hotel"></i> Hotels</a>
                        <a href="#important"><i class="fa fa-exclamation"></i> Essential trip info</a>
                        <a id="bookBtn2" style="cursor:pointer"><i class="fa fa-pencil"></i> Book this tour</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="migas">
                    <span><a href="{{ route('index') }}">Home</a></span>
                    <span><a href="">→
                            @foreach ($tour->categorias as $categoria)
                                {{ $categoria->nombre }}
                            @endforeach
                        </a>
                    </span>
                    <span><a>→ {{ $tour->nombre }}</a></span>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div id="overview" style="padding-top: 4rem">
                            <h3>Overview:</h3>
                            <p class="mt-4">{!! $tour->resumen !!}</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <h3 id="galery" class="mb-3" style="padding-top: 4rem">Gallery:</h3>
                        <div id="galeria" class="carousel slide" data-ride="carousel">
                            <!-- Indicadores -->
                            <ol class="carousel-indicators">
                                @foreach (array_chunk(explode(',', $tour->galeria), 2) as $index => $imagenes)
                                    <li data-target="#galeria" data-slide-to="{{ $index }}"
                                        class="{{ $loop->first ? 'active' : '' }}"></li>
                                @endforeach
                            </ol>
                            <!-- Imágenes -->
                            <div class="carousel-inner" style="height: 300px;">
                                @foreach (array_chunk(explode(',', $tour->galeria), 2) as $index => $imagenes)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style="height: 100%">
                                        <div class="row" style="height: 100%">
                                            @foreach ($imagenes as $imagen)
                                                <div class="col-md-6" style="padding: 0px">
                                                    <img src="{{ asset($imagen) }}" alt="Galería {{ $tour->nombre }}"
                                                        loading="lazy"
                                                        style="width: 100%;  height:100%; object-fit: cover">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Controles -->
                            <a class="carousel-control-prev" href="#galeria" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Anterior</span>
                            </a>
                            <a class="carousel-control-next" href="#galeria" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Siguiente</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="itinerary" style="padding-top: 5rem;" id="itinerary">
                            <h3>Itinerary:</h3>
                        </div>
                    </div>
                    <script>
                        const detalladoContent = `{!! $tour->detallado !!}`;

                        document.addEventListener("DOMContentLoaded", function() {
                            const itineraryContainer = document.getElementById("itinerary");
                            const h3Element = itineraryContainer.querySelector("h3");

                            const detalladoDiv = document.createElement("div");
                            detalladoDiv.innerHTML = detalladoContent;

                            const h2Elements = detalladoDiv.querySelectorAll("h2");

                            h2Elements.forEach(function(h2, index) {
                                const content = getNextNodesUntilNextH2(h2);
                                const accordionId = `accordion-${index}`;
                                const collapseId = `collapse-${index}`;

                                // Create accordion card
                                const card = document.createElement("div");
                                card.classList.add("card");

                                // Create card header
                                const cardHeader = document.createElement("div");
                                cardHeader.classList.add("card-header");
                                cardHeader.id = accordionId;

                                // Create collapse button
                                const collapseButton = document.createElement("button");
                                collapseButton.classList.add("btn", "btn-link");
                                collapseButton.setAttribute("type", "button");
                                collapseButton.setAttribute("data-toggle", "collapse");
                                collapseButton.setAttribute("data-target", `#${collapseId}`);
                                collapseButton.setAttribute("aria-expanded", "true");
                                collapseButton.setAttribute("aria-controls", collapseId);
                                collapseButton.textContent = h2.textContent;

                                // Append collapse button to card header
                                cardHeader.appendChild(collapseButton);

                                // Create card body
                                const cardBody = document.createElement("div");
                                cardBody.classList.add("collapse");
                                cardBody.id = collapseId;
                                cardBody.setAttribute("aria-labelledby", accordionId);
                                cardBody.setAttribute("data-parent", "#itinerary");
                                cardBody.innerHTML = content;

                                // Append card header and body to card
                                card.appendChild(cardHeader);
                                card.appendChild(cardBody);

                                // Append card to itineraryContainer
                                itineraryContainer.appendChild(card);
                            });
                        });

                        // Function to get the content between current h2 and the next h2
                        function getNextNodesUntilNextH2(currentH2) {
                            const contentNodes = [];
                            let currentNode = currentH2.nextSibling;

                            while (currentNode && currentNode.tagName !== "H2") {
                                contentNodes.push(currentNode);
                                currentNode = currentNode.nextSibling;
                            }

                            const wrapperDiv = document.createElement("div");
                            contentNodes.forEach(function(node) {
                                wrapperDiv.appendChild(node.cloneNode(true));
                            });

                            return wrapperDiv.innerHTML;
                        }
                    </script>

                    <div class="col-12">
                        <div id="includes" style="padding-top: 4rem">
                            <h3>Inclusions:</h3>
                            {!! $tour->incluidos !!}
                        </div>
                    </div>
                    <div class="col-12">
                        <div id="dates" style="padding-top: 4rem">
                            <h3>Next dates with offers:</h3>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="thead thead-dark">
                                        <tr>
                                            <th>Start date</th>
                                            <th>Final date</th>
                                            <th>Price</th>
                                            <th>Reserve</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tour->fechas as $fecha)
                                            <tr>
                                                <td class="align-middle">{{ date('M d, Y', strtotime($fecha->fecha)) }}
                                                </td>
                                                <td class="align-middle">
                                                    <?php
                                                    $fechaFinal = date('Y-m-d', strtotime($fecha->fecha . ' + ' . $tour->dias . ' days'));
                                                    ?>
                                                    {{ date('M d, Y', strtotime($fechaFinal)) }}
                                                </td>
                                                <td class="align-middle">
                                                    <del>U${{ $tour->precioPublicado }}.00</del><br><span
                                                        class="precioTour">U${{ $fecha->precio }}</span>
                                                </td>
                                                <!-- Popup -->
                                                @php
                                                    $popupId = 'popupBook_' . $loop->iteration;
                                                @endphp
                                                <td class="align-middle">
                                                    <a href="#" class="btnReserva"
                                                        data-popup="{{ $popupId }}">Book</a>
                                                </td>
                                                <div class="popupBook" id="{{ $popupId }}">
                                                    <div class="popupBookContent">
                                                        <span class="closeBookContent"
                                                            data-popup="{{ $popupId }}">&times;</span>
                                                        <h3 class="text-center mb-4">Reserve this trip</h3>
                                                        <form method="POST" action="{{ route('reservas') }}">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="tipoViaje">Tour:</label>
                                                                        <input type="text" id="tour"
                                                                            name="tour"
                                                                            value="{{ $tour->nombre }} → {{ $tour->dias }} days"
                                                                            readonly class="form-control form-control-sm">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="precio">Price:</label>
                                                                        <input type="text" id="precio"
                                                                            name="precio" readonly
                                                                            class="form-control form-control-sm"
                                                                            value="USD ${{ $fecha->precio }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="fechaViaje">Date start trip:</label>
                                                                        <input type="text" id="fechaViaje"
                                                                            name="fechaViaje" readonly
                                                                            class="form-control form-control-sm"
                                                                            value="{{ date(' d M, Y', strtotime($fecha->fecha)) }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="nombre">Name:</label>
                                                                        <input type="text" id="nombre"
                                                                            name="nombre"
                                                                            class="form-control form-control-sm" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="telefono">Phone:</label>
                                                                        <input type="tel" id="telefono"
                                                                            name="telefono"
                                                                            class="form-control form-control-sm" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="email">Email:</label>
                                                                        <input type="tel" id="email"
                                                                            name="email"
                                                                            class="form-control form-control-sm" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="cantidadAdultos">Adults:</label>
                                                                        <input type="number" id="cantidadAdultos"
                                                                            name="cantidadAdultos"
                                                                            class="form-control form-control-sm"
                                                                            min="1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="cantidadAdultos">Children:</label>
                                                                        <input type="number" id="cantidadAdultos"
                                                                            name="cantidadAdultos"
                                                                            class="form-control form-control-sm"
                                                                            min="1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="mensaje">Menssage:</label>
                                                                <textarea id="mensaje" name="mensaje" class="form-control form-control-sm" rows="4" required></textarea>
                                                            </div>
                                                            <div class="text-center">
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-sm">Enviar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const buttons = document.querySelectorAll('.btnReserva');
                                        const popups = document.querySelectorAll('.popupBook');

                                        // Función para abrir el popup correspondiente al botón clickeado
                                        function openPopup(event) {
                                            event.preventDefault();
                                            const popupId = this.getAttribute('data-popup');
                                            const popup = document.getElementById(popupId);
                                            popup.style.display = 'block';

                                            // Agregar evento de clic al botón de cierre para cerrar el popup
                                            const closeBtn = popup.querySelector('.closeBookContent');
                                            closeBtn.addEventListener('click', closePopup);
                                        }

                                        // Función para cerrar el popup
                                        function closePopup(event) {
                                            event.preventDefault();
                                            const popupId = this.getAttribute('data-popup');
                                            const popup = document.getElementById(popupId);
                                            popup.style.display = 'none';

                                            // Eliminar el evento de clic al botón de cierre
                                            const closeBtn = popup.querySelector('.closeBookContent');
                                            closeBtn.removeEventListener('click', closePopup);
                                        }

                                        // Agregar evento de clic a cada botón para abrir el popup correspondiente
                                        buttons.forEach(button => {
                                            button.addEventListener('click', openPopup);
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div id="hotels" style="padding-top: 4rem">
                            <h3>Hotels:</h3>
                            <div class="row mt-3">
                                @foreach ($tour->hoteles as $hotel)
                                    <div class="col-lg-6 hotel">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <img src="{{ asset($hotel->img) }}" width="100%"
                                                    alt="{{ $hotel->nombre }}" loading="lazy">
                                            </div>
                                            <div class="col-md-7">
                                                <h5>{{ $hotel->nombre }}</h5>
                                                <p><i class="fa fa-map-marker"></i> {{ $hotel->ubicacion }}</p>
                                                <p class="card-text">{{ $hotel->descripcion }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div id="importante" style="padding-top: 4rem">
                            <h3>Essential trip info:</h3>
                            <p>
                                {!! $tour->importante !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const bookBtn = document.getElementById('bookBtn');
            const bookBtn2 = document.getElementById('bookBtn2');
            const bookPopup = document.getElementById('bookPopup');
            const closeBtn = document.getElementById('closeBtn');

            function openPopup() {
                bookPopup.style.display = 'flex';
            }

            function closePopup() {
                bookPopup.style.display = 'none';
            }

            bookBtn.addEventListener('click', openPopup);
            bookBtn2.addEventListener('click', openPopup);
            closeBtn.addEventListener('click', closePopup);

            bookPopup.addEventListener('click', (event) => {
                if (!event.target.closest('.popup-content')) {
                    closePopup();
                }
            });
        </script>

    </div>
@endsection
