<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rutCliente')->nullable()->default(null)->unsigned();
            $table->integer('codigoTorta')->nullable()->default(null)->unsigned();
            $table->integer('cantPersonas')->nullable()->default(null)->unsigned();
            $table->string('dedicatoria', 128)->nullable()->default(null);
            $table->integer('cantidadTortas')->nullable()->default(null);
            $table->integer('estadoPedido')->nullable()->default(null)->unsigned();
            $table->integer('rutTrabajador')->nullable()->default(null)->unsigned();
            $table->integer('rutCompletado')->nullable()->default(null)->unsigned();
            $table->date('fechaPedido');  
            $table->integer('precioTotal'); 
            $table->date('fechaEntrega');
            $table->integer('estadoPago')->unsigned(); 
            $table->string('codigoCliente');
           
            $table->index(["estadoPedido"], 'fk_estadoPedido');

            $table->index(["rutTrabajador"], 'fk_rutTrabajador');

            $table->index(["rutCompletado"], 'fk_rutCompletado');

            $table->index(["rutCliente"], 'fk_clientePedidos');

            $table->index(["cantPersonas"], 'fk_cantidadPersonas');

            $table->index(["codigoTorta"], 'fk_codigoTorta');

            $table->index(["estadoPago"],'fk_estadoPago_pedidos');


            $table->foreign('cantPersonas', 'fk_cantidadPersonas')
                ->references('id')->on('cantidadPersonas')
                ->onDelete('cascade')
                ->onUpdate('restrict');

            $table->foreign('codigoTorta', 'fk_codigoTorta')
                ->references('id')->on('tortas')
                ->onDelete('cascade')
                ->onUpdate('restrict');

            $table->foreign('estadoPedido', 'fk_estadoPedido')
                ->references('id')->on('estadoPedidos')
                ->onDelete('cascade')
                ->onUpdate('restrict');

            $table->foreign('rutTrabajador', 'fk_rutTrabajador')
                ->references('id')->on('trabajadores')
                ->onDelete('cascade')
                ->onUpdate('restrict');

            $table->foreign('rutCompletado', 'fk_rutCompletado')
                ->references('id')->on('trabajadores')
                ->onDelete('cascade')
                ->onUpdate('restrict');

            $table->foreign('rutCliente', 'fk_clientePedidos')
                ->references('id')->on('clientes')
                ->onDelete('cascade')
                ->onUpdate('restrict');

            $table->foreign('estadoPago','fk_estadoPago_pedidos') 
                ->references('id')->on('estadoPagos')
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
        Schema::dropIfExists('pedidos');
    }
}
