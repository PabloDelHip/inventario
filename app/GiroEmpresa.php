<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiroEmpresa extends Model
{
    protected $table = 'giros_empresas';
    protected $fillable = ['titulo'];
}
