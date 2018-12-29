<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NumFactura',128)->nullable()->default(null);
            $table->date('fechaEntrada');
            $table->integer('codigoProducto')->unsigned();
            $table->integer('cantidad');


            $table->index(["codigoProducto"], 'fk_codigoProducto_entrada');

            $table->foreign('codigoProducto', 'fk_codigoProducto_entrada')
                ->references('id')->on('materiaPrimas')
                ->onDelete('cascade')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entradas');
    }
}
