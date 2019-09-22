<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pagos';
    protected $fillable = ['total_anterior_con_iva', 'total_anterior_sin_iva','total_actual_con_iva','total_actual_sin_iva','pago_con_iva','pago_sin_iva','pago_efectivo','pago_cuenta','venta_id'];
}