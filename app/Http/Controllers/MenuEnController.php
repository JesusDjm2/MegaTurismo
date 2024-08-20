<?php

namespace App\Http\Controllers;

use App\Models\MenuEn;
use Illuminate\Http\Request;

class MenuEnController extends Controller
{
    public function index()
    {
        $textos = MenuEn::all();
        foreach ($textos as $texto) {
            $texto->redes_sociales_array = explode(',', $texto->redes_sociales);
        }
        return view('admin.menuen.index', compact('textos'));
    }

    public function guardarRedesSociales(Request $request)
    {
        $menu_id = $request->input('menu_id');
        $redes_sociales = $request->input('redes_sociales');
        $redes_sociales_url = [];

        foreach ($redes_sociales as $redSocial) {
            $url = $request->input($redSocial);
            $redes_sociales_url[$redSocial] = $url;
        }
        return redirect()->route('nombre_de_la_ruta', ['menu_id' => $menu_id, 'redes_sociales_url' => $redes_sociales_url]);
    }
    public function create()
    {
        $redes = [
            'Facebook' => 'Facebook',
            'Twitter' => 'Twitter',
            'Instagram' => 'Instagram',
            'Pinterest' => 'Pinterest',
            'TriAdvisor' => 'TriAdvisor',
            'YouTube' => 'YouTube',
        ];
        return view('admin.menuen.create', compact('redes'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'correo1' => 'required|string',
            'correo2' => 'nullable|string',
            'redes_sociales' => 'nullable|array',
        ]);

        $correo1 = $request->input('correo1');
        $correo2 = $request->input('correo2');
        $redesSociales = $request->input('redes_sociales');

        $redesSocialesString = implode(',', $redesSociales);

        $menuEn = new MenuEn();
        $menuEn->correo1 = $correo1;
        $menuEn->correo2 = $correo2;
        $menuEn->redes_sociales = $redesSocialesString;
        $menuEn->save();

        return redirect()->route('menuen.index')->with('success', 'Menú en inglés creado correctamente!');
    }


    public function edit($id)
    {
        $menuEn = MenuEn::findOrFail($id);
        $redesSocialesSeleccionadas = explode(',', $menuEn->redes_sociales);
        $redesSociales = ['facebook', 'instagram', 'twitter', 'pinterest', 'linkedin', 'tripadvisor', 'youtube', 'whatsapp'];
        return view('admin.menuen.edit', compact('menuEn', 'redesSociales', 'redesSocialesSeleccionadas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'correo1' => 'required|string',
            'correo2' => 'nullable|string',
            'redes_sociales' => 'nullable|array',
        ]);

        $menuEn = MenuEn::findOrFail($id);

        $correo1 = $request->input('correo1');
        $correo2 = $request->input('correo2');
        $redesSociales = $request->input('redes_sociales');
        $redesSocialesString = implode(',', $redesSociales);

        $menuEn->correo1 = $correo1;
        $menuEn->correo2 = $correo2;
        $menuEn->redes_sociales = $redesSocialesString;
        $menuEn->save();

        return redirect()->route('menuen.index')->with('success', 'Menú en inglés actualizado correctamente!');
    }

    public function destroy($id)
    {
        $menuEn = MenuEn::findOrFail($id);
        $menuEn->delete();

        return redirect()->route('menuen.index')->with('success', 'Menú en inglés eliminado correctamente!');
    }

}