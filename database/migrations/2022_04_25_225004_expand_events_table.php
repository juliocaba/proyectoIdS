<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExpandEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->text('description');
            $table->enum('animal_size', ['pequeño', 'mediano', 'grande']);
            $table->enum('type_service', ['baño', 'corte', 'ambos']);
        });;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('animal_size');
            $table->dropColumn('type_service');
        });;
    }
}
