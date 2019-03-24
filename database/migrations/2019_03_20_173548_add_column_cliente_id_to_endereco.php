<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnClienteIdToEndereco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('endereco', function (Blueprint $table) {
            $table->integer('cliente_id')->nullable();
            $table->foreign('cliente_id')
            ->references('id')
            ->on('cliente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('endereco', function (Blueprint $table) {
            $table->dropColumn('cliente_id');
        });
    }
}
