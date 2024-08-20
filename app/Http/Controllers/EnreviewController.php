<?php

namespace App\Http\Controllers;

use App\Models\Enreview;
use Illuminate\Http\Request;

class EnreviewController extends Controller
{
    public function index()
    {
        $comments = Enreview::all();
        return view('admin.tours.comentarios.index', compact('comments'));
    }

    public function create()
    {
        $comment = null; 
        return view('admin.tours.comentarios.create', compact('comment'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'img' => 'required|max:2048',
            'calificacion' => 'required|integer|between:1,5',
            'comentario' => 'nullable|string',
        ]);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $imgName = $img->getClientOriginalName();
            $img->move('img/comentarios/', $imgName);
            $imgPath = 'img/comentarios/' . $imgName;
        } else {
            $imgPath = null;
        }

        Enreview::create([
            'nombre' => $request->input('nombre'),
            'img' => $imgPath,
            'calificacion' => $request->input('calificacion'),
            'comentario' => $request->input('comentario'),
        ]);

        return redirect()->route('enreviews.index')->with('success', 'Comentario en inglés agregado exitosamente.');
    }
    public function edit($id)
    {
        $comment = Enreview::findOrFail($id);
        return view('admin.tours.comentarios.edit', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'calificacion' => 'required|integer|between:1,5',
            'comentario' => 'nullable|string',
        ]);

        $comment = Enreview::findOrFail($id);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $imgName = $img->getClientOriginalName();
            $img->move('img/comentarios/', $imgName);
            $imgPath = 'img/comentarios/' . $imgName;
            if ($comment->img && file_exists(public_path($comment->img))) {
                unlink(public_path($comment->img));
            }
        } else {
            $imgPath = $comment->img;
        }

        $comment->update([
            'nombre' => $request->input('nombre'),
            'img' => $imgPath,
            'calificacion' => $request->input('calificacion'),
            'comentario' => $request->input('comentario'),
        ]);

        return redirect()->route('enreviews.index')->with('success', 'Comentario en inglés actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $comment = Enreview::findOrFail($id);

        // Eliminar la imagen si existe
        if ($comment->img && file_exists(public_path($comment->img))) {
            unlink(public_path($comment->img));
        }

        $comment->delete();

        return redirect()->route('enreviews.index')->with('success', 'Comentario en inglés eliminado exitosamente.');
    }


}