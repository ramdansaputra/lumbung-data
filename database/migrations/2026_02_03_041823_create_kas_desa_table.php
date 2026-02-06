<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kas_desa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tahun_id')->constrained('tahun_anggaran');
            $table->decimal('saldo_awal', 15, 2)->default(0);
            $table->decimal('saldo_akhir', 15, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kas_desa');
    }
};
