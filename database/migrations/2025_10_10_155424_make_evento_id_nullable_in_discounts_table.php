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
        // Usando SQL puro para evitar la necesidad de Doctrine DBAL
        DB::statement('ALTER TABLE `discounts` MODIFY `evento_id` BIGINT UNSIGNED NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Revertir a NOT NULL (esto fallará si hay registros con evento_id NULL)
        DB::statement('ALTER TABLE `discounts` MODIFY `evento_id` BIGINT UNSIGNED NOT NULL');
    }
};
