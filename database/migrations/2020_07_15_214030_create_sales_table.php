<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     * tabla pivote tipo_venta
     * tabla pivote folio 
     * tabla pivote folio-venta-unidad
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('correo');
            $table->string('telefono');
            $table->text('contacto');
            $table->float('total_sin_iva');
            $table->float('total_con_iva');
            $table->float('total_pagado');
            $table->boolean('factura');
            $table->boolean('nota');
            $table->boolean('publico_general');
            $table->integer('giro_id')->unsigned();
            $table->foreign('giro_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('usuario_venta_id')->unsigned();
            $table->foreign('usuario_venta_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('usuario_modifico_id')->unsigned();
            $table->foreign('usuario_modifico_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('cliente_provedor_id')->unsigned();
            $table->foreign('cliente_provedor_id')->references('id')->on('cliente_provedores')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
