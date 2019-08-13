<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ciudad;
use App\ClienteProveedor;

class ClienteProveedorController extends Controller
{
    public function alta()
    {
        $ciudades = Ciudad::all();
        return view('clientes_proveedores.alta', compact('ciudades'));
    }

    public function save(Request $request)
    {
        $reserva = ClienteProveedor::create($request->all());
        return \Redirect::route('/alta-cliente-proveedor')
          ->with('message', 'El Cliente o Proveedor se a guardado de forma correcta');
    }

    public function show()
    {
        $clientes_proveedores = ClienteProveedor::all();
        return view('clientes_proveedores.ver', compact('clientes_proveedores'));
    }

    public function datos($id)
    {
        echo "perrosss";
        // $clientes_proveedores = ClienteProveedor::all();
        // return view('clientes_proveedores.ver', compact('clientes_proveedores'));
    }
}
