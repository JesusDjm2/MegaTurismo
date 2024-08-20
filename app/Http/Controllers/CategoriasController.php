<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Tours;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = Categorias::all();
        return view('admin.tours.categorias.index', compact('categorias'));
    }

    public function create()
    {
        $categoria = new Categorias;
        return view('admin.tours.categorias.create', compact('categoria'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'slug' => 'required',
        ]);

        $categoria = new Categorias;
        $categoria->nombre = $validatedData['nombre'];
        $categoria->slug = $validatedData['slug'];
        $categoria->save();

        return redirect()->route('cats.index')->with('success', 'Categoria creada con éxito.');
    }

    public function show($slug)
    {
        $categorias = Tours::all();
        return view('admin.tours.categorias.show', compact('categorias'));
    }

    public function edit($id)
    {
        $categoria = Categorias::query()->find($id);
        return view('admin.tours.categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(Categorias::rules());

        $categoria = Categorias::findOrFail($id);
        $categoria->nombre = $request->input('nombre');
        $categoria->slug = $request->input('slug');
        $categoria->save();

        return redirect()->route('cats.index')
            ->with('success', 'Categoria actualizado correctamente!');
    }

    public function destroy($id)
    {
        $categoria = Categorias::query()->find($id);
        $categoria->delete();

        return redirect()->route('cats.index')
            ->with('success', 'Categoria eliminada correctamente!');
    }
}