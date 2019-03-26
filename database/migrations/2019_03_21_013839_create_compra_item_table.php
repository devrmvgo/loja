<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompraItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('produto_id');
            $table->foreign('produto_id')
            ->references('id')
            ->on('produto');
            $table->integer('qntd');
            $table->double('valor_total');
            $table->integer('compra_id');
            $table->foreign('compra_id')
            ->references('id')
            ->on('compra');
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
        Schema::dropIfExists('compra_item');
    }
}
