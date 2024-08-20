<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Destino;
use App\Models\Entag;
use Illuminate\Http\Request;

class EntagController extends Controller
{
    public function index()
    {
        $tags = Entag::all();
        return view('admin.blogs.enblogs.tags.index', compact('tags'));
    }
    public function create()
    {
        $tag = new Entag();
        return view('admin.blogs.enblogs.tags.create', compact('tag'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => 'required|unique:entags',
        ]);

        $tag = new Entag();
        $tag->nombre = $request->nombre;
        $tag->slug = $request->slug;
        $tag->save();

        return redirect()->route('entags.index')->with('success', 'Tga en ingles creado exitosamente!');
    }
    public function edit($id)
    {
        $tag = Entag::findOrFail($id);
        return view('admin.blogs.enblogs.tags.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => 'required|unique:entags,slug,' . $id,
        ]);

        $tag = Entag::findOrFail($id);
        $tag->nombre = $request->nombre;
        $tag->slug = $request->slug;
        $tag->save();

        return redirect()->route('entags.index')->with('success', 'Tag en ingles actualizado correctamente!');
    }

    public function show($tag)
    {
        
        $tag = Entag::where('slug', $tag)->first();
        if ($tag) {
            $blogs = $tag->blogs()->get();
        } else {
            $blogs = collect();
        }
        return view('admin.blogs.enblogs.tags.show', compact('tag', 'blogs'));
    }

    public function destroy($id)
    {
        $tag = Entag::findOrFail($id);
        $tag->delete();

        return redirect()->route('entags.index')->with('success', 'Tag eliminado correctamente.');
    }
}
