<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penduduk_id')->constrained('penduduk');
            $table->string('kategori');
            $table->string('judul');
            $table->text('isi');
            $table->string('lampiran')->nullable();
            $table->enum('status', ['baru','diproses','selesai','ditolak'])->default('baru');
            $table->text('tanggapan')->nullable();
            $table->string('petugas')->nullable();
            $table->timestamp('tanggal')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
    }
};
