<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableTypesFixes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->string('nombre_cliente', 100)->change();
            $table->string('telefono', 30)->change();
        });;

        Schema::table('events', function (Blueprint $table) {
            $table->string('title', 50)->change();
            $table->string('description', 500)->nullable(true)->change();
        });;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->text('nombre_cliente')->change();
            $table->text('telefono')->change();
        });;

        Schema::table('events', function (Blueprint $table) {
            $table->text('title')->change();
            $table->text('description')->nullable(false)->change();
        });;
    }
}
