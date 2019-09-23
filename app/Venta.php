<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';
    protected $fillable = ['correo', 'telefono','contacto','total_sin_iva','total_con_iva','total_pagado','factura','nota','publico_general','giro_id','usuario_venta_id','usuario_modifico_id','cliente_provedor_id'];
}
