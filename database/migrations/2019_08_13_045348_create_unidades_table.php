<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('modelo');
            $table->string('marca');
            $table->float('capacidad_kg');
            $table->float('capacidad_lt');
            $table->integer('capacidad_pasajeros');
            $table->integer('num_ejes');
            $table->string('placas');
            $table->string('folio_tarjeta_circulacion');
            $table->unsignedBigInteger('cliente_provedores_id');
            $table->foreign('cliente_provedores_id')->references('id')->on('cliente_provedores')->onDelete('cascade');
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
        Schema::dropIfExists('unidades');
    }
}
