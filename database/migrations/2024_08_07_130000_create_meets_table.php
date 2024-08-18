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
        Schema::create('meets', function (Blueprint $table) {
            $table->id();
            $table->foreignId("cliente_id")->references('id')->on('clientes')->constrained()->onDelete('cascade');
            $table->foreignId("user_id")->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->foreignId('reason_id')->references('id')->on('reasons')->constrained()->onDelete('cascade');
            $table->dateTime('start');
            $table->boolean('contrato')->nullable();
            $table->text('observacion')->nullable();
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
        Schema::dropIfExists('meets');
    }
};
