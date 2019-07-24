<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('total_anterior_con_iva');
            $table->float('total_anterior_sin_iva');
            $table->float('total_actual_con_iva');
            $table->float('total_actual_sin_iva');
            $table->float('pago_con_iva');
            $table->float('pago_sin_iva');
            $table->boolea('pago_efectivo');
            $table->boolean('pago_cuenta');
            $table->integer('sales_id')->unsigned();
            $table->foreign('sales_id')->references('id')->on('sales')->onDelete('cascade');
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
        Schema::dropIfExists('pagos');
    }
}
