<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $table = 'unidades';
    protected $fillable = ['modelo', 'marca','capacidad_kg','capacidad_lt','capacidad_pasajeros','num_ejes','placas','folio_tarjeta_circulacion','cliente_provedores_id'];

    public function clienteProvedor()
    {
        return $this->belongsTo(ClienteProveedor::class,'cliente_provedor_id');
    }

}
