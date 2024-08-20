<?php

namespace App\Http\Controllers;

use App\Models\Destino;
use App\Models\Tours;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DestinoController extends Controller
{
    public function index()
    {
        $destinos = Destino::all();
        foreach ($destinos as $destino) {
            $destino->descripcion = Str::words($destino->descripcion, 40, '...');
        }
        return view('admin.tours.tours.destinos.index', compact('destinos'));
    }
    public function create()
    {
        return view('admin.tours.tours.destinos.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'img' => 'required|image|max:2048',
            'imgThumb' => 'required|image|max:2048',
            'slug' => 'required|unique:destinos',
        ]);

        $imageName = $request->file('img')->getClientOriginalName();
        $request->file('img')->move(public_path('img/destinos'), $imageName);

        $thumbName = $request->file('imgThumb')->getClientOriginalName();
        $request->file('imgThumb')->move(public_path('img/destinos/thumbs'), $thumbName);

        $destino = Destino::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'img' => $imageName,
            'imgThumb' => $thumbName,
            'slug' => $request->slug,
        ]);

        return redirect()->route('destinies.index')->with('success', 'Destino creado correctamente');
    }

    public function edit($id)
    {
        $destino = Destino::find($id);
        return view('admin.tours.tours.destinos.edit', compact('destino'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'img' => 'nullable|image|max:2048',
            'imgThumb' => 'nullable|image|max:2048',
            'slug' => 'required|unique:destinos,slug,' . $id,
        ]);

        $destino = Destino::findOrFail($id);

        $destino->nombre = $request->nombre;
        $destino->descripcion = $request->descripcion;
        $destino->slug = $request->slug;

        if ($request->hasFile('img')) {
            $imageName = $request->file('img')->getClientOriginalName();
            $request->file('img')->move(public_path('img/destinos'), $imageName);
            $destino->img = $imageName;
        }

        if ($request->hasFile('imgThumb')) {
            $thumbName = $request->file('imgThumb')->getClientOriginalName();
            $request->file('imgThumb')->move(public_path('img/destinos/thumbs'), $thumbName);
            $destino->imgThumb = $thumbName;
        }

        $destino->save();

        return redirect()->route('destinies.index')->with('success', 'Destino actualizado correctamente');
    }
    public function show($slug)
    {
        $destino = Destino::where('slug', $slug)->first();
        $tours = Tours::inRandomOrder()->take(4)->get();

        return view('admin.tours.tours.destinos.show', compact('destino', 'tours'));
    }

    public function destroy($id)
    {
        $destino = Destino::findOrFail($id);
        $destino->delete();

        return redirect()->route('destinies.index')->with('success', 'Destino eliminado correctamente');
    }
}
