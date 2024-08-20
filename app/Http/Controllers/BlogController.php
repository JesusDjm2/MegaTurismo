<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Destino;
use App\Models\Entag;
use App\Models\Tours;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        $tags = Entag::all();
        return view('admin.blogs.enblogs.blogs.index', compact('blogs', 'tags'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        $results = Blog::where('nombre', 'like', '%' . $searchTerm . '%')->get();
        return view('admin.blogs.enblogs.blogs.search', ['results' => $results, 'searchTerm' => $searchTerm]);
    }
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $destinos = Destino::all();
        $tours = Tours::inRandomOrder()->take(4)->get();
        $blogs = Blog::where('id', '!=', $blog->id)
            ->orderBy('created_at', 'desc')
            ->orderBy('updated_at', 'desc')
            ->take(4)
            ->get();
        return view('admin.blogs.enblogs.blogs.show', compact('blog', 'destinos', 'blogs', 'tours'));
    }

    public function create()
    {
        $blog = new Blog();
        $tags = Entag::query()->pluck('nombre', 'id');
        return view('admin.blogs.enblogs.blogs.create', compact('blog', 'tags'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'resumen' => 'required',
            'descripcion' => 'required',
            'imgThumb' => 'required|image|max:2048',
            'imgBig' => 'required|image|max:2048',
            'keyword' => 'nullable',
            'tags' => 'nullable|array',
            'slug' => 'required|unique:blogs',
        ]);

        $imageNameThumb = $request->file('imgThumb')->getClientOriginalName();
        $request->file('imgThumb')->move(public_path('img/blogs/thumbs'), $imageNameThumb);

        $imageNameBig = $request->file('imgBig')->getClientOriginalName();
        $request->file('imgBig')->move(public_path('img/blogs/'), $imageNameBig);

        $blog = Blog::create([
            'nombre' => $request->nombre,
            'resumen' => $request->resumen,
            'descripcion' => $request->descripcion,
            'imgThumb' => $imageNameThumb,
            'imgBig' => $imageNameBig,
            'keyword' => $request->keyword,
            'slug' => $request->slug,
        ]);

        if ($request->tags) {
            $blog->tags()->sync($request->tags);
        }

        return redirect()->route('enblogs.index')->with('success', 'Blog creado correctamente');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $tags = Entag::all();

        return view('admin.blogs.enblogs.blogs.edit', compact('blog', 'tags'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'nombre' => 'required',
            'resumen' => 'required',
            'descripcion' => 'required',
            'imgThumb' => 'nullable|image|max:2048',
            'imgBig' => 'nullable|image|max:2048',
            'keyword' => 'nullable',
            'tags' => 'nullable|array',
            'slug' => 'required|unique:blogs,slug,' . $id,
        ]);

        $blog->nombre = $request->nombre;
        $blog->resumen = $request->resumen;
        $blog->descripcion = $request->descripcion;
        $blog->keyword = $request->keyword;
        $blog->slug = $request->slug;

        if ($request->hasFile('imgThumb')) {
            $imageNameThumb = $request->file('imgThumb')->getClientOriginalName();
            $request->file('imgThumb')->move(public_path('img/blogs/thumbs'), $imageNameThumb);
            $blog->imgThumb = $imageNameThumb;
        }

        if ($request->hasFile('imgBig')) {
            $imageNameBig = $request->file('imgBig')->getClientOriginalName();
            $request->file('imgBig')->move(public_path('img/blogs/'), $imageNameBig);
            $blog->imgBig = $imageNameBig;
        }

        $blog->save();
        if ($request->tags) {
            $blog->tags()->sync($request->tags);
        } else {
            $blog->tags()->detach();
        }
        return redirect()->route('enblogs.index')->with('success', 'Blog actualizado correctamente');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->tags()->detach();
        $blog->delete();

        return redirect()->route('enblogs.index')->with('success', 'Blog eliminado correctamente');
    }


}