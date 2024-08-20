<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('admin.tours.imgs.index', compact('images'));
    }

    public function create()
    {
        return view('admin.tours.imgs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'img' => 'required|image|max:2048',
        ]);

        $image = $request->file('img');
        $originalName = $image->getClientOriginalName();
        $imageName = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '-');
        $extension = $image->getClientOriginalExtension();
        $newImageName = $imageName . '.' . $extension;

        $image->move(public_path('img/imagenes/'), $newImageName);

        Image::create([
            'img' => $newImageName,
        ]);

        return redirect()->route('images.index')->with('success', 'Imagen subida correctamente!');
    }

    public function edit($id)
    {
        $img = Image::find($id);
        return view('admin.tours.imgs.edit', compact('img'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'img' => 'required|image|max:2048',
        ]);
        // Obtener la ruta completa de la imagen anterior
        $image = Image::findOrFail($id);

        $previousImagePath = public_path('img/imagenes/' . $image->img);
        if (File::exists($previousImagePath)) {
            File::delete($previousImagePath);
        }
        $newImage = $request->file('img');
        $newImageName = $newImage->getClientOriginalName();
        $ImageName = Str::slug(pathinfo($newImageName, PATHINFO_FILENAME), '-');
        $extension = $image->getClientOriginalExtension();
        $newNameImage = $ImageName . '.' . $extension;
        $newImage->move(public_path('img/imagenes/'), $newNameImage);

        $image->update([
            'img' => $newNameImage,
        ]);        

        return redirect()->route('images.index')->with('success', 'Imagen actualizada correctamente!');
    }



    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $imagePath = public_path('img/imagenes/' . $image->img);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $image->delete();

        return redirect()->route('images.index')->with('success', 'Imagen eliminada exitosamente!.');
    }
}