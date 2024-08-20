<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $footContacts = AboutUs::all();
        return view('admin.foot.contact.index', compact('footContacts'));
    }

    public function create()
    {
        return view('admin.foot.contact.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'correo1' => 'required|string',
            'telefono1'=> 'required|string',
            'address' => 'required|string',
        ]);

        AboutUs::create($request->all());

        return redirect()->route('aboutus.index')->with('success', 'Contacto de pie de página creado correctamente');
    }

    public function edit($id)
    {
        $footContact = AboutUs::findOrFail($id);
        return view('admin.foot.contact.edit', compact('footContact'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'correo1' => 'required|string',
            'telefono1'=> 'required|string',
            'address' => 'required|string',
        ]);

        $footContact = AboutUs::findOrFail($id);
        $footContact->update($request->all());

        return redirect()->route('aboutus.index')->with('success', 'Contacto de pie de página actualizado correctamente');
    }

    public function destroy($id)
    {
        $footContact = AboutUs::findOrFail($id);
        $footContact->delete();

        return redirect()->route('aboutus.index')->with('success', 'Contacto de pie de página eliminado correctamente');
    }
}