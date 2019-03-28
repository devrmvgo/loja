<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelatoriosFinanceirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relatorios_financeiros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mes_ano');
            $table->integer('qntd_total_produtos_vendidos');
            $table->integer('qntd_vendas');
            $table->double('valor_total_vendido');
            $table->integer('empresa_id');
            $table->foreign('empresa_id')
            ->references('id')
            ->on('empresa');
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
        Schema::dropIfExists('relatorios_financeiros');
    }
}
