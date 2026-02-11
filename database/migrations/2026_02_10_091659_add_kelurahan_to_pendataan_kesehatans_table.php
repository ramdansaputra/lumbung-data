<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pendataan_kesehatans', function (Blueprint $table) {
            if (!Schema::hasColumn('pendataan_kesehatans', 'kelurahan')) {
                $table->string('kelurahan')->nullable()->after('keterangan');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendataan_kesehatans', function (Blueprint $table) {
            $table->dropColumn('kelurahan');
        });
    }
};
