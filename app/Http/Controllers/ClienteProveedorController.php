<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ciudad;
use App\ClienteProveedor;
use App\Unidad;

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
        $cliente_proveedor = ClienteProveedor::find($id);
        $unidades = Unidad::all()->where('cliente_provedores_id','=',$id);
        // $clientes_proveedores = ClienteProveedor::all();
        // return view('clientes_proveedores.ver', compact('clientes_proveedores'));
    }

    public function buscar_cliente_ajax(Request $request)
    {
       
        $cliente_provedores = ClienteProveedor::all()->where('rfc','=',$request->rfc_cliente);
        $data = array();
        foreach ($cliente_provedores as $cliente_provedor)
        {
            $data['id_cliente'] = $cliente_provedor->id;
            $data['razon_social'] = $cliente_provedor->razon_social;
            $data['correo'] = $cliente_provedor->correo;
            $data['telefono'] = $cliente_provedor->telefono;
        }
        echo json_encode($data);
        // $clientes_proveedores = ClienteProveedor::all();
        // return view('clientes_proveedores.ver', compact('clientes_proveedores'));
    }
}
