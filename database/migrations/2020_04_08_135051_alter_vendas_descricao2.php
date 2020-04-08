<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterVendasDescricao2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vendas', function (Blueprint $table) {
            $table->dropColumn('valor');
        });
        Schema::table('vendas', function (Blueprint $table) {
            $table->double('valor', 8,2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vendas', function (Blueprint $table) {
            $table->string('valor', 8,2);
        });
        Schema::table('vendas', function (Blueprint $table) {
            $table->dropColumn('valor');
        });
    }
}
