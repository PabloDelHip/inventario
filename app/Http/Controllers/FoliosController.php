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

    public function saveVarios(Request $request)
    {
        $requestData = $request->all();
        
        $folio = new Folio();
        $folio_inicio = $request->numero_folio_inicio;
        $folio_final = $request->numero_folio_final;

        echo $request->numero_folio_inicio;

        for ($i=$folio_inicio; $i <=$folio_final; $i++) { 
            $requestData['folio'] = $request->folio.$i;
            Folio::create($requestData); 
        }

        return \Redirect::route('alta-folios')
          ->with('message', 'Los folios se guardaron de forma correcta');
    }

    public function showAll()
    {
        $folios = Folio::all();
        return view('folios.ver', compact('folios'));
    }
}
