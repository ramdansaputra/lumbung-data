<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('realisasi_anggaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apbdes_id')
                  ->constrained('apbdes')
                  ->cascadeOnDelete();
            $table->date('tanggal');
            $table->decimal('jumlah', 15, 2);
            $table->text('keterangan')->nullable();
            $table->string('bukti')->nullable(); // file
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('realisasi_anggaran');
    }
};
