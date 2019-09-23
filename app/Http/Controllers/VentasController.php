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
        $venta->save();

        //Modificar folios
        $folios = $request->folios;
        $this->modificarFolio($venta->id,$folios);
        $this->agregarPrimerPago($request,$venta->id);

    }

    public function show($id_venta)
    {
        $pagos = Pago::all()->where('venta_id','=',$id_venta);
        $venta = Venta::find($id_venta);
        $folios = Folio::all()->where('ventas_id','=',$id_venta)->sortBy("folio");
        dd($venta->clienteProvedor);
        return view('ventas.ver',compact('pagos','venta','folios')); 
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

    private function agregarPrimerPago($datos,$id_venta)
    {
        // dd($datos);
        $iva = $datos->total_cobrar * 0.16;
        $total_con_iva = $datos->total_cobrar + $iva;
        $total_actual_sin_iva = $datos->total_cobrar - $datos->pago_abono;
        $total_actual_con_iva = $total_con_iva - $datos->pago_abono;


        $venta = new Pago();
        $venta->total_anterior_con_iva = $total_con_iva;
        $venta->total_anterior_sin_iva = $datos->total_cobrar;
        $venta->total_actual_con_iva = $total_actual_con_iva;
        $venta->total_actual_sin_iva = $total_actual_sin_iva;
        $venta->pago_con_iva = $datos->pago_abono;
        $venta->pago_sin_iva = $datos->pago_abono;
        $venta->pago_efectivo = 0;
        $venta->pago_cuenta = 0;
        $venta->venta_id=$id_venta;
        $venta->save();
        echo "todo chidori";
    }
}