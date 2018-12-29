<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTortasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tortas', function (Blueprint $table) {
            $table->increments('id');
             $table->string('nombre', 128)->nullable()->default(null);
            $table->integer('codigoReceta')->nullable()->default(null)->unsigned();
            $table->integer('precio')->nullable()->default(null);
            $table->string('codigoTorta');
            $table->string('descripcion',500)->nullable()->default(null);
            $table->string('imagen',300)->nullable()->default(null);
            
            $table->index(["codigoReceta"], 'fk_codigoReceta');
            
            $table->foreign('codigoReceta', 'fk_codigoReceta')
                ->references('id')->on('recetas')
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
        Schema::dropIfExists('tortas');
    }
}
