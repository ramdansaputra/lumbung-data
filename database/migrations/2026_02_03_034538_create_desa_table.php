<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('desa', function (Blueprint $table) {
            $table->id();
            $table->string('kode_desa')->unique();
            $table->string('nama_desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->string('kode_pos', 10)->nullable();
            $table->decimal('luas_wilayah', 10, 2)->nullable();
            $table->integer('jumlah_penduduk')->default(0);
            $table->integer('jumlah_kk')->default(0);
            $table->enum('klasifikasi_desa', ['swadaya','swakarya','swasembada']);
            $table->text('alamat_kantor')->nullable();
            $table->string('telp')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('desa');
    }
};
