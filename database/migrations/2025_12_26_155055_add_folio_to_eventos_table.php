<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eventos', function (Blueprint $table) {
            // Add folio column after id (unsigned integer, nullable, unique)
            $table->unsignedInteger('folio')->nullable()->unique()->after('id');
        });

        // Backfill existing records: set folio = id for all existing events
        DB::statement('UPDATE eventos SET folio = id WHERE folio IS NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eventos', function (Blueprint $table) {
            $table->dropColumn('folio');
        });
    }
};
