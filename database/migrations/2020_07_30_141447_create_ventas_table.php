<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
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
            $table->unsignedBigInteger('giro_id');
            $table->foreign('giro_id')->references('id')->on('giros_empresas')->onDelete('cascade');
            $table->unsignedBigInteger('usuario_venta_id');
            $table->foreign('usuario_venta_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('usuario_modifico_id');
            $table->foreign('usuario_modifico_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('cliente_provedor_id');
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
        Schema::dropIfExists('ventas');
    }
}
