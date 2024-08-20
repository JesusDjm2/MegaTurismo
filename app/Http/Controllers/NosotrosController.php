<?php

namespace App\Http\Controllers;

use App\Models\Nosotros;
use Illuminate\Http\Request;

class NosotrosController extends Controller
{
    public function index()
    {
        $vistas = Nosotros::all();
        return view('admin.foot.index', compact('vistas'));
    }
    public function create()
    {
        return view('admin.foot.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'texto' => 'required|string',
            'slug' => 'required|string',
        ]);

        Nosotros::create($request->all());

        return redirect()->route('nosotros.index')->with('success', 'Pagina creada correctamente');
    }
    public function edit($id)
    {
        $item = Nosotros::findOrFail($id);
        return view('admin.foot.edit', compact('item'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string',
            'texto' => 'required|string',
            'slug' => 'required|string',
        ]);

        $item = Nosotros::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('nosotros.index')->with('success', 'Página actualizada correctamente');
    }
    public function show($slug)
    {
        /* $vista = Nosotros::findOrFail($slug); */
        $vista = Nosotros::where('slug', $slug)->firstOrFail();
        return view('admin.foot.show', compact('vista'));
    }
    public function destroy($id)
    {
        $item = Nosotros::findOrFail($id);
        $item->delete();
        return redirect()->route('nosotros.index')->with('success', 'Página eliminada correctamente');
    }
}