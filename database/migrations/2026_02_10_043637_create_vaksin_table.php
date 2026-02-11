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
        Schema::create('vaksins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penduduk_id')->constrained('penduduk')->onDelete('cascade');
            $table->string('jenis_vaksin');
            $table->string('dosis');
            $table->date('tanggal_vaksinasi');
            $table->string('tempat_vaksinasi')->nullable();
            $table->string('petugas')->nullable();
            $table->enum('status', ['sudah', 'belum', 'jadwal_ulang']);
            $table->text('efek_samping')->nullable();
            $table->date('tanggal_jadwal_ulang')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaksin');
    }
};
