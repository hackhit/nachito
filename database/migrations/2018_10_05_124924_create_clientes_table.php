<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
             $table->string('rut', 128);
            $table->string('nombre', 128)->nullable()->default(null);
            $table->string('apellido', 128)->nullable()->default(null);
            $table->string('direccion', 128)->nullable()->default(null);
            $table->integer('telefono')->nullable()->default(null);
            $table->string('email', 128)->nullable()->default(null);
            $table->string('password')->nullable()->default(null);
            $table->integer('codigoCategoria')->nullable()->default(null)->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->index(["codigoCategoria"], 'fkcodigo');

            $table->unique(["rut"], 'rut');


            $table->foreign('codigoCategoria', 'fkcodigo')
                ->references('id')->on('categoriaClientes')
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
        Schema::dropIfExists('clientes');
    }
}
