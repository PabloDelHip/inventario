<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteProveedorController extends Controller
{
    public function alta()
    {
        return view('clientes_proveedores.alta');
    }
}
