<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteProveedor extends Model
{
    protected $table = 'cliente_provedores';
    protected $fillable = ['nombre', 'razon_social','correo','telefono','contacto','rfc','domicilio','tipo','ciudad_id'];
}
