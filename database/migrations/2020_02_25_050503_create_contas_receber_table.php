<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContasReceberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contas_receber', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('atendimento_id')->nullable();
            $table->string('forma_recebimento')->nullable();
            $table->date('data_vencimento');
            $table->decimal('valor_original',12,2);
            $table->date('data_pagamento')->nullable();
            $table->decimal('desconto', 12,2)->nullable();
            $table->decimal('valor_pago',12,2)->nullable();
            $table->longtext('observacao')->nullable();
            $table->foreign('atendimento_id')->references('id')->on('atendimentos')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contas_receber');
    }
}
