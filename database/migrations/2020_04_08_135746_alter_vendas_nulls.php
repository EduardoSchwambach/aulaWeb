<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterVendasNulls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vendas', function(Blueprint $table){
            $table->unsignedBigInteger('id_usuario')->nullable()->change();
            $table->unsignedBigInteger('id_cliente')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vendas', function(Blueprint $table){
            $table->bigInteger('id_usuario')->change();
            $table->bigInteger('id_cliente')->change();
        });
    }
}