<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salidas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',128)->nullable()->default(null);
            $table->date('fechaSalida');
            $table->integer('codigoMateriaPrima')->unsigned();            
            $table->integer('cantidad');
            $table->integer('codigoPedido')->unsigned();


            $table->index(["codigoMateriaPrima"], 'fk_codigoMateriaPrima_salida');

            $table->index(["codigoPedido"], 'fk_codigoPedido_salida');

          
            $table->foreign('codigoMateriaPrima', 'fk_codigoMateriaPrima_salida')
                ->references('id')->on('materiaPrimas')
                ->onDelete('cascade')
                ->onUpdate('restrict');

            $table->foreign('codigoPedido', 'fk_codigoPedido_salida')
                ->references('id')->on('pedidos')
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
        Schema::dropIfExists('salidas');
    }
}
