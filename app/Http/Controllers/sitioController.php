<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sitioController extends Controller
{
    public function home()
    {
      
        return view('home');

        // $hotels = Hotel::all();
        // $zones = Zone::all();

        // // foreach ($variable as $key => $value) {
        // //     echo $hotel->zone->name.'<br>';
        // // }
        // // $valores = session('sesion');
        // // 
        //  //$openpay = \Openpay::getInstance('memcbgt3z8rr5hrd1ztp', 'sk_454ca75f2fc540fb9b8c7751e1e131d1');
        // $title ="Mejores tours en Cancun | Actividades y atracciones";
        // $meta_description ="En Cancún Do It encontraras los mejores tours y atracciones en Cancún y la Riviera Maya y tours a Chichén Itzá";
        // $categories = Categorie::all()->where('active', '=',true);
        // $keywords = "tours en cancun, riviera maya, tours economicos,chichen itza, ruinas mayas, actividades en cancun";
        // return view('home',compact('categories','title','meta_description','keywords','hotels','zones'));
    }
}
