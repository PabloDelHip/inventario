<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pago;

class PagoController extends Controller
{
    public function show()
    {
        $pagos = Pago::all();
        dd($pagos);
        return view('giros_empresas.ver', compact('giros_empresas'));
    }
}
