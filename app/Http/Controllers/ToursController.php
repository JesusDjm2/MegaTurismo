<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Categorias;
use App\Models\Destino;
use App\Models\Enreview;
use App\Models\Fecha;
use App\Models\FooterText;
use App\Models\Hotel;
use App\Models\Tours;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ToursController extends Controller
{
    public function index()
    {
        $tours = Tours::with('categorias')->get();
        return view('admin.tours.tours.index', compact('tours'));
    }


    public function search(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        $results = Tours::where('nombre', 'like', '%' . $searchTerm . '%')->get();
        return view('admin.tours.tours.search', ['results' => $results, 'searchTerm' => $searchTerm]);
    }


    public function mostrar()
    {
        $tours = Tours::all();
        $gruposTours = $tours->chunk(4);
        $reviews = Enreview::all()->chunk(3);
        $blogs = Blog::take(4)->latest()->get();
        return view('welcome', compact('gruposTours', 'tours', 'reviews', 'blogs'));
    }

    public function create()
    {
        $categorias = Categorias::query()->pluck('nombre', 'id');
        return view('admin.tours.tours.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|unique:tours',
            'descripcion' => 'required',
            'resumen' => 'required',
            'detallado' => 'required',
            'incluidos' => 'required',
            'importante' => 'nullable',
            'lugarInicio' => 'nullable',
            'lugarFin' => 'nullable',
            'precioReal' => 'required|integer',
            'precioPublicado' => 'required|integer',
            'dias' => 'required|integer',
            'dificultad' => 'required',
            'imgThumb' => 'required',
            'img' => 'required',
            'mapa' => 'nullable',
            'keywords' => 'required',
            'slug' => 'required|unique:tours',
            'galeria' => 'nullable',

            'fechas' => 'nullable|array',
            'fechas.*.fecha' => 'required|date',
            'fechas.*.precio' => 'required|numeric',

            'hoteles' => 'nullable|array',
            'hoteles.*.nombre' => 'required',
            'hoteles.*.ubicacion' => 'required',
            'hoteles.*.descripcion' => 'required',
            'hoteles.*.img' => 'required|image',
        ]);

        $tour = new Tours();
        $tour->nombre = $validated['nombre'];
        $tour->descripcion = $validated['descripcion'];
        $tour->precioReal = $validated['precioReal'];
        $tour->precioPublicado = $validated['precioPublicado'];
        $tour->dias = $validated['dias'];
        $tour->dificultad = $validated['dificultad'];
        $tour->lugarInicio = $request->input('lugarInicio');
        $tour->lugarFin = $request->input('lugarFin');
        $tour->resumen = $request->input('resumen');
        $tour->detallado = $request->input('detallado');
        $tour->incluidos = $request->input('incluidos');
        $tour->importante = $request->input('importante');
        $tour->keywords = $validated['keywords'];
        $tour->slug = $validated['slug'];

        $imgThumbName = $validated['imgThumb']->getClientOriginalName();
        $validated['imgThumb']->move('img/thumb/', $imgThumbName);
        $tour->imgThumb = 'img/thumb/' . $imgThumbName;

        $imgName = $validated['img']->getClientOriginalName();
        $validated['img']->move('img/galeria/', $imgName);
        $tour->img = 'img/galeria/' . $imgName;

        if ($request->has('mapa')) {
            $mapa = $request->file('mapa');
            $mapaName = $mapa->getClientOriginalName();
            $mapa->move('img/mapas/', $mapaName);
            $tour->mapa = 'img/mapas/' . $mapaName;
        }

        if ($request->has('galeria')) {
            $galeriaFiles = $request->file('galeria');
            $galeriaNames = [];

            foreach ($galeriaFiles as $galeriaFile) {
                $galeriaName = $galeriaFile->getClientOriginalName();
                $galeriaFile->move('img/galeriaTours/', $galeriaName);
                $galeriaNames[] = url('img/galeriaTours/' . $galeriaName);
            }

            $tour->galeria = implode(',', $galeriaNames);
        }
        $tour->save();

        $tour->categorias()->attach($request->input('categoria_id'));

        if ($request->has('fechas')) {
            $fechas = $request->input('fechas');
            foreach ($fechas as $fecha) {
                $fechaModel = new Fecha();
                $fechaModel->fecha = $fecha['fecha'];
                $fechaModel->precio = $fecha['precio'];
                $fechaModel->tour_id = $tour->id;
                $fechaModel->save();
            }
        }

        if ($request->has('hoteles')) {
            foreach ($validated['hoteles'] as $hotelData) {
                $hotel = new Hotel();
                $hotel->nombre = $hotelData['nombre'];
                $hotel->ubicacion = $hotelData['ubicacion'];
                $hotel->descripcion = $hotelData['descripcion'];
                if ($hotelData['img']) {
                    $imgName = $hotelData['img']->getClientOriginalName();
                    $hotelData['img']->move('img/hoteles/', $imgName);
                    $hotel->img = 'img/hoteles/' . $imgName;
                }
                $hotel->tour_id = $tour->id;
                $hotel->save();
            }
        }
        return redirect()->route('tours.index')->with('success', 'Se ha actualizado correctamente el tour.');
    }
    public function show($slug)
    {
        $tour = Tours::where('slug', $slug)->firstOrFail();
        $destinos = Destino::all();
        return view('admin.tours.tours.show', compact('tour', 'destinos'));
    }
    public function edit($id)
    {
        $tour = Tours::findOrFail($id);
        $fechas = $tour->fechas;
        $hoteles = $tour->hoteles;
        $categorias = Categorias::pluck('nombre', 'id');
        return view('admin.tours.tours.edit', compact('tour', 'fechas', 'hoteles', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => [
                'required',
                Rule::unique('tours')->ignore($id),
            ],
            'descripcion' => 'required',
            'resumen' => 'required',
            'detallado' => 'required',
            'incluidos' => 'required',
            'importante' => 'nullable',
            'lugarInicio' => 'nullable',
            'lugarFin' => 'nullable',
            'precioReal' => 'required|integer',
            'precioPublicado' => 'required|integer',
            'dias' => 'required|integer',
            'dificultad' => 'required',
            'imgThumb' => 'nullable',
            'img' => 'nullable',
            'mapa' => 'nullable',
            'keywords' => 'required',
            'slug' => [
                'required',
                Rule::unique('tours')->ignore($id),
            ],
            'galeria' => 'nullable',

            'fechas' => 'nullable|array',
            'fechas.*.fecha' => 'nullable|date',
            'fechas.*.precio' => 'nullable|numeric',

            'hoteles' => 'nullable|array',
            'hoteles.*.nombre' => 'nullable',
            'hoteles.*.ubicacion' => 'nullable',
            'hoteles.*.descripcion' => 'nullable',
            'hoteles.*.img' => 'nullable|image',
        ]);


        $tour = Tours::findOrFail($id);
        $tour->nombre = $validated['nombre'];
        $tour->descripcion = $validated['descripcion'];
        $tour->resumen = $request->input('resumen');
        $tour->detallado = $request->input('detallado');
        $tour->incluidos = $request->input('incluidos');
        $tour->importante = $request->input('importante');
        $tour->lugarInicio = $request->input('lugarInicio');
        $tour->lugarFin = $request->input('lugarFin');
        $tour->precioReal = $validated['precioReal'];
        $tour->precioPublicado = $validated['precioPublicado'];
        $tour->dias = $validated['dias'];
        $tour->dificultad = $validated['dificultad'];
        $tour->keywords = $validated['keywords'];
        $tour->slug = $validated['slug'];

        if ($request->has('imgThumb')) {
            $imgThumbName = $validated['imgThumb']->getClientOriginalName();
            $validated['imgThumb']->move('img/thumb/', $imgThumbName);
            $tour->imgThumb = 'img/thumb/' . $imgThumbName;
        }

        if ($request->has('img')) {
            $imgName = $validated['img']->getClientOriginalName();
            $validated['img']->move('img/galeria/', $imgName);
            $tour->img = 'img/galeria/' . $imgName;
        }

        if ($request->has('mapa')) {
            $mapa = $request->file('mapa');
            $mapaName = $mapa->getClientOriginalName();
            $mapa->move('img/mapas/', $mapaName);
            $tour->mapa = 'img/mapas/' . $mapaName;
        }

        if ($request->has('galeria')) {
            $galeriaFiles = $request->file('galeria');
            $galeriaNames = [];

            foreach ($galeriaFiles as $galeriaFile) {
                $galeriaName = $galeriaFile->getClientOriginalName();
                $galeriaFile->move('img/galeriaTours', $galeriaName);
                $galeriaNames[] = 'img/galeriaTours/' . $galeriaName;
            }

            $tour->galeria = implode(',', $galeriaNames);
        }

        $tour->categorias()->sync($request->input('categoria_id'));

        $fechas = $request->input('fechas');
        $tour->fechas()->delete();
        if ($fechas !== null) {
            foreach ($fechas as $fechaData) {
                $fecha = new Fecha();
                $fecha->fecha = $fechaData['fecha'];
                $fecha->precio = $fechaData['precio'];
                $tour->fechas()->save($fecha);
            }
        }

        if ($request->has('hoteles')) {
            $hoteles = $validated['hoteles'] ?? [];

            foreach ($hoteles as $hotelData) {
                $nombreHotel = $hotelData['nombre'];
                $hotel = Hotel::where('nombre', $nombreHotel)->where('tour_id', $tour->id)->first();

                if (!$hotel) {
                    $hotel = new Hotel();
                    $hotel->nombre = $nombreHotel;
                    $hotel->tour_id = $tour->id;
                }
                $hotel->ubicacion = $hotelData['ubicacion'];
                $hotel->descripcion = $hotelData['descripcion'];

                if (isset($hotelData['img'])) {
                    $img = $hotelData['img'];
                    if ($img) {
                        $imgName = $img->getClientOriginalName();
                        $img->move('img/hoteles/', $imgName);
                        $hotel->img = 'img/hoteles/' . $imgName;
                    }
                }

                $hotel->save();
            }
        }


        /* if ($request->has('hoteles')) {
            foreach ($validated['hoteles'] as $hotelData) {
                $nombreHotel = $hotelData['nombre'];
                $hotel = Hotel::where('nombre', $nombreHotel)->where('tour_id', $tour->id)->first();

                if (!$hotel) {
                    $hotel = new Hotel();
                    $hotel->nombre = $nombreHotel;
                    $hotel->tour_id = $tour->id;
                }
                $hotel->ubicacion = $hotelData['ubicacion'];
                $hotel->descripcion = $hotelData['descripcion'];

                if (isset($hotelData['img'])) {
                    $img = $hotelData['img'];
                    if ($img) {
                        $imgName = $img->getClientOriginalName();
                        $img->move('img/hoteles/', $imgName);
                        $hotel->img = 'img/hoteles/' . $imgName;
                    }
                }

                $hotel->save();
            }
        } */




        /* if ($request->has('hoteles')) {
            foreach ($validated['hoteles'] as $hotelData) {
                $hotel = new Hotel();
                $hotel->nombre = $hotelData['nombre'];
                $hotel->ubicacion = $hotelData['ubicacion'];
                $hotel->descripcion = $hotelData['descripcion'];

                if (isset($hotelData['img'])) {
                    $img = $hotelData['img'];
                    if ($img) {
                        $imgName = $img->getClientOriginalName();
                        $img->move('img/hoteles/', $imgName);
                        $hotel->img = 'img/hoteles/' . $imgName;
                    }
                }  else {
                    $hotel->img = $hotel->img ?: '';                 
                }

                $hotel->tour_id = $tour->id;
                $hotel->save();
                dd($hotel);
            }
        } */

        $tour->save();
        return redirect()->route('tours.index');
    }

    public function destroy(Tours $tour)
    {
        $tour->delete();
        return redirect()->route('tours.index')->with('success', 'El tour ha sido eliminado correctamente.');
    }
}
