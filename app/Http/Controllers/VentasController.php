<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Folio;
use App\Venta;
use App\Pago;

class VentasController extends Controller
{
    public function alta($id)
    {
        $cliente_proveedores = Folio::all();
        $folios = Folio::all()->where('vendido','=',0)->sortBy("folio");
        return view('ventas.alta',compact('folios','id')); 
    }

    public function save(Request $request)
    {
        
        $iva = $request->total_cobrar * 0.16;
        $total_con_iva = $request->total_cobrar + $iva;
        // echo $total_con_iva;
        //dd($request->all());
        
        //Guardar Venta
        $venta = new Venta();
        $venta->correo = $request->correo;
        $venta->telefono = $request->telefono;
        $venta->contacto = $request->contacto;
        $venta->total_sin_iva = $request->total_cobrar;
        $venta->total_con_iva = $total_con_iva;
        $venta->total_pagado = $request->pago_abono;

        switch ($request->tipo_recibo) {
            case 'factura':
                $venta->factura = 1;        
                break;
            case 'nota':
                $venta->nota = 1;
                break;
            case 'publico_general':
                $venta->publico_general = 1;
                break;
        }

        $venta->giro_id = $request->giro_empresa;
        $venta->usuario_venta_id = 1;
        $venta->usuario_modifico_id = 1;
        $venta->cliente_provedor_id = $request->_idCliente;
       // $venta->save();

        //Modificar folios
        // $folios = $request->folios;
        // $this->modificarFolio($venta->id,$folios);
        $this->agregarPago($request->all());

    }

    private function modificarFolio($id,$folios)
    {
        $now = new \DateTime();
        $now->format('d-m-Y H:i:s');
        $num_folios = count($folios);

         //dd($folios);
        for($i=0;$i<$num_folios;$i++)
        {
            // echo .'<br>';
            Folio::where('id', $folios[$i])
            ->update(['vendido' => 1,
                    'fecha_venta' => $now,
                    'ventas_id' => $id ]);
        }
    }

    private function agregarPago($datos)
    {
        dd($datos);
        $iva = $datos->total_cobrar * 0.16;
        $total_con_iva = $datos->total_cobrar + $iva;
        $total_actual_sin_iva = $datos->total_cobrar;
        $total_actual_con_iva = $datos->total_cobrar;


        $venta = new Venta();
        $venta->total_anterior_con_iva = $total_con_iva;
        $venta->total_anterior_sin_iva = $datos->total_cobrar;
        $venta->total_actual_con_iva = $request->correo;
        $venta->total_actual_sin_iva = $request->correo;
        $venta->pago_con_iva = $request->correo;
        $venta->pago_sin_iva = $request->correo;
        $venta->pago_efectivo = $request->correo;
        $venta->pago_cuenta = $request->correo;
    }
}