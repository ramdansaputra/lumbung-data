<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('wilayah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desa')->cascadeOnDelete();
            $table->string('dusun')->nullable();
            $table->string('rw', 5)->nullable();
            $table->string('rt', 5)->nullable();
            $table->string('ketua_rt')->nullable();
            $table->string('ketua_rw')->nullable();
            $table->integer('jumlah_kk')->default(0);
            $table->integer('jumlah_penduduk')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wilayah');
    }
};
