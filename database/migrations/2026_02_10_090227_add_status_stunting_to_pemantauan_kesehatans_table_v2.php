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
        Schema::table('pemantauan_kesehatans', function (Blueprint $table) {
            if (!Schema::hasColumn('pemantauan_kesehatans', 'status_stunting')) {
                $table->enum('status_stunting', ['normal', 'stunting', 'risiko_stunting'])->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemantauan_kesehatans', function (Blueprint $table) {
            if (Schema::hasColumn('pemantauan_kesehatans', 'status_stunting')) {
                $table->dropColumn('status_stunting');
            }
        });
    }
};
