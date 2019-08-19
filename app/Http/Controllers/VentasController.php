<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VentasController extends Controller
{
    public function alta($id)
    {
        return view('ventas.alta');
    }
}
