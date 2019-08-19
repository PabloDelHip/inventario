<?php

namespace App\Http\Controllers;
use App\GiroEmpresa;

use Illuminate\Http\Request;

class GirosEmpresasController extends Controller
{
    public function alta()
    {
        return view('giros_empresas.alta');
    }

    public function save(Request $request)
    {
        $reserva = GiroEmpresa::create($request->all());
        return \Redirect::route('alta-giro-empresa')
          ->with('message', 'El Giro/Empresa se a guardado de forma correcta');
    }

    public function show()
    {
        $giros_empresas = GiroEmpresa::all();
        return view('giros_empresas.ver', compact('giros_empresas'));
    }
}
