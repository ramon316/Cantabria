<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventoTableclothTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento_tablecloth', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evento_id')->references('id')->on('eventos')->constrained()->onDelete('cascade');
            $table->foreignId('tablecloth_id')->references('id')->on('tablecloths')->onDelete('cascade');
            $table->foreignId('tableclothbase_id')->references('id')->on('tableclothbases')->onDelete('cascade');
            $table->foreignId('chair_id')->references('id')->on('chairs')->onDelete('cascade');
            $table->integer('amount');
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
        Schema::dropIfExists('evento_tablecloth');
    }
}
