<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("cliente_id")->references('id')->on('clientes')->constrained()->onDelete('cascade');
            $table->foreignId("user_id")->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->string("title");
            $table->integer("horas");
            $table->date("start");
            $table->date('end');
            $table->integer('invitados');
            $table->date('validez');
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
        Schema::dropIfExists('cotizacions');
    }
}
