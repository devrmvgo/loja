<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endereco', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('logradouro', 100);
            $table->string('logradouro_numero', 60);
            $table->string('logradouro_complemento', 100)->nullable();
            $table->string('bairro', 100);
            $table->string('cep', 9);
            $table->integer('cidade_id')->nullable();
            $table->foreign('cidade_id')
            ->references('id')
            ->on('cidade');
            $table->integer('empresa_id')->nullable();
            $table->foreign('empresa_id')
            ->references('id')
            ->on('empresa');
            $table->boolean('ativo')->default(true);
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
        Schema::dropIfExists('endereco');
    }
}
