<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cpf', 15);
            $table->string('nome', 200);
            $table->string('data_nasc', 10);
            $table->string('telefone', 30);
            $table->string('email', 200);
            $table->string('password', 100);
            $table->boolean('ativo')->default(true);
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
        Schema::dropIfExists('cliente');
    }
}
