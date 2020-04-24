<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipamentos', function (Blueprint $table) {
               $table->bigIncrements('id');
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->string('tipo');
            $table->string('marca');
            $table->string('capacidade');
            $table->string('modelo');
            $table->string('serie');
            $table->string('localizacao');
            $table->longtext('obervacao')->nullable();
             $table->foreign('cliente_id')->references('id')->on('clientes')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('equipamentos');
    }
}
