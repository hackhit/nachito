<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabajadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajadores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rut', 128);
             $table->string('usuario', 128);
            $table->string('nombre', 128)->nullable()->default(null);
            $table->string('apellido', 128)->nullable()->default(null);
            $table->integer('telefono')->nullable()->default(null);
            $table->string('email', 128)->nullable()->default(null);
            $table->string('password')->nullable()->default(null);
            $table->integer('cod_cargo')->nullable()->default(null)->unsigned();
            $table->timestamps();

            $table->index(["cod_cargo"], 'fk_codCargo');

            $table->unique(["rut"], 'rut');

            $table->foreign('cod_cargo', 'fk_codCargo')
                ->references('id')->on('cargos')
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
        Schema::dropIfExists('trabajadores');
    }
}
