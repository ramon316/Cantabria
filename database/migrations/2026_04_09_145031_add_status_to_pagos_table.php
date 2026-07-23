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
        Schema::table('pagos', function (Blueprint $table) {
            $table->string('status')->default('pendiente')->after('tipo');
            $table->unsignedBigInteger('user_id_validator')->nullable()->after('status');
            $table->text('observaciones')->nullable()->after('user_id_validator');

            $table->foreign('user_id_validator')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pagos', function (Blueprint $table) {
            $table->dropForeign(['user_id_validator']);
            $table->dropColumn(['status', 'user_id_validator', 'observaciones']);
        });
    }
};
