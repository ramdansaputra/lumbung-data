<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('apbdes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tahun_id')->constrained('tahun_anggaran');
            $table->foreignId('kegiatan_id')->constrained('kegiatan_anggaran');
            $table->foreignId('sumber_dana_id')->constrained('sumber_dana');
            $table->decimal('anggaran', 15, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('apbdes');
    }
};
