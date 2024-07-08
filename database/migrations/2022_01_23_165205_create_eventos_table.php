w<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->foreignId("cliente_id")->reference('id')->on('clientes')->constrained()->onDelete('cascade');
            $table->foreignId("user_id")->reference('id')->on('users')->constrained()->onDelete('cascade');
            $table->string("title");
            $table->string('subtitle');
            $table->dateTime('start')->unique();
            $table->dateTime('end');
            $table->integer('invitados');
            $table->string('color');
            $table->string('layout')->nullable();
            $table->string('contrat')->nullable();
            $table->date('closed_at')->nullable();
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
        Schema::dropIfExists('eventos');
    }
}
