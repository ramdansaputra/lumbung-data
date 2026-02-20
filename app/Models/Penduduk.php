<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model {

    protected $table = 'penduduk';

    protected $fillable = [
        'nik',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'golongan_darah',
        'agama',
        'pendidikan',
        'pekerjaan',
        'status_kawin',
        'status_hidup',
        'kewarganegaraan',
        'no_telp',
        'email',
        'alamat',
        'wilayah_id',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    // ==================
    // RELASI — DATA DASAR & AKUN
    // ==================

    public function user() {
        return $this->hasOne(User::class, 'penduduk_id');
    }

    public function wilayah() {
        return $this->belongsTo(Wilayah::class, 'wilayah_id');
    }

    public function keluargas() {
        return $this->belongsToMany(Keluarga::class, 'keluarga_anggota')
            ->withPivot('hubungan_keluarga')
            ->withTimestamps();
    }

    public function rumahTanggas() {
        return $this->belongsToMany(RumahTangga::class, 'rumah_tangga_penduduk')
            ->withPivot('hubungan_rumah_tangga')
            ->withTimestamps();
    }

    // ==================
    // RELASI — KESEHATAN
    // ==================

    public function kiaAsIbu() {
        return $this->hasMany(Kia::class, 'penduduk_id_ibu');
    }

    public function kiaAsAnak() {
        return $this->hasMany(Kia::class, 'penduduk_id_anak');
    }

    public function vaksins() {
        return $this->hasMany(Vaksin::class, 'penduduk_id');
    }

    // ==================
    // RELASI — BANTUAN
    // ==================

    public function programBantuan() {
        return $this->hasMany(ProgramPeserta::class, 'penduduk_id');
    }

    // ==================
    // HELPER
    // ==================

    public function getKeluargaUtama() {
        return $this->keluargas()
            ->wherePivot('hubungan_keluarga', 'kepala_keluarga')
            ->first();
    }

    public function getRumahTanggaUtama() {
        return $this->rumahTanggas()
            ->wherePivot('hubungan_rumah_tangga', 'kepala_rumah_tangga')
            ->first();
    }
}
