<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Folio;

class VentasController extends Controller
{
    public function alta($id)
    {
        $cliente_proveedores = Folio::all();
        $folios = Folio::all()->where('vendido','=',0)->sortBy("folio");
        return view('ventas.alta',compact('folios'));
    }
}
