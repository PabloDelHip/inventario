<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unidad;
use App\ClienteProveedor;

class UnidadesController extends Controller
{
    public function alta()
    {
        $cliente_proveedores = ClienteProveedor::all();
        return view('unidades.alta', compact('cliente_proveedores'));
    }

    public function save(Request $request)
    {
        $reserva = Unidad::create($request->all());
        return \Redirect::route('alta-unidades')
          ->with('message', 'La unidad se a guardado de forma correcta');
    }
}
