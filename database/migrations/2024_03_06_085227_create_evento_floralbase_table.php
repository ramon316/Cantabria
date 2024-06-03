<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento_floralbase', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evento_id')->references('id')->on('eventos')->constrained()->onDelete('cascade');
            $table->foreignId('floralbase_id')->references('id')->on('floralbases')->constrained()->onDelete('cascade');
            $table->string('napkins')->nullable();
            $table->string('plates')->nullable();
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
        Schema::dropIfExists('evento_floralbase');
    }
};
