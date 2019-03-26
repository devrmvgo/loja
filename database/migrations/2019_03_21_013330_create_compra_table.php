<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('valor_total');
            $table->integer('cliente_id');
            $table->foreign('cliente_id')
            ->references('id')
            ->on('cliente');
            $table->integer('empresa_id');
            $table->foreign('empresa_id')
            ->references('id')
            ->on('empresa');
            $table->integer('endereco_entrega_id')->nullable();
            $table->foreign('endereco_entrega_id')
            ->references('id')
            ->on('endereco');
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
        Schema::dropIfExists('compra');
    }
}
