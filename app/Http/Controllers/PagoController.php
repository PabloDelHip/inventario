<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pago;

class PagoController extends Controller
{
    public function show()
    {
        $pagos = Pago::all();
        return view('pagos.ver', compact('pagos'));
    }
}
