<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtendimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->unsignedBigInteger('contato_id')->nullable();
            $table->unsignedBigInteger('tecnico_id')->nullable();
            $table->unsignedBigInteger('equipamento_id')->nullable();
            $table->string('numero_atendimento');
            $table->string('tipo_atendimento');
            $table->longText('ocorrencia');
            $table->longText('laudo');
            $table->longText('acao_corretiva');
            $table->date('data_atendimento');
            $table->date('data_vencimento');
            $table->decimal('valor');
            $table->foreign('cliente_id')->references('id')->on('clientes')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('contato_id')->references('id')->on('contatos')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tecnico_id')->references('id')->on('tecnicos')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('equipamento_id')->references('id')->on('equipamentos')
                ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('atendimentos');
    }
}
