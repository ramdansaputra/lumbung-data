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
        Schema::table('wilayah', function (Blueprint $table) {
            $table->integer('laki_laki')->default(0)->after('jumlah_penduduk');
            $table->integer('perempuan')->default(0)->after('laki_laki');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wilayah', function (Blueprint $table) {
            $table->dropColumn(['laki_laki', 'perempuan']);
        });
    }
};
