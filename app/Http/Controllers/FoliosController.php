<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Folio;

class FoliosController extends Controller
{
    public function alta()
    {
        return view('folios.alta');
    }

    public function save(Request $request)
    {
        $reserva = Folio::create($request->all());
        return \Redirect::route('alta-folios')
          ->with('message', 'El folio se a guardado de forma correcta');
    }
}
