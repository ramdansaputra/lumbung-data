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

    // Relasi ke User (Akun Login)
    public function user()
    {
        return $this->hasOne(User::class, 'penduduk_id');
    }

    // Many-to-many relationship with Keluarga via keluarga_anggota pivot
    public function keluargas() {
        return $this->belongsToMany(Keluarga::class, 'keluarga_anggota')
                    ->withPivot('hubungan_keluarga')
                    ->withTimestamps();
    }

    // Many-to-many relationship with RumahTangga via rumah_tangga_penduduk pivot
    public function rumahTanggas() {
        return $this->belongsToMany(RumahTangga::class, 'rumah_tangga_penduduk')
                    ->withPivot('hubungan_rumah_tangga')
                    ->withTimestamps();
    }

    public function wilayah() {
        return $this->belongsTo(Wilayah::class);
    }

    // Helper methods to get specific relationships
    public function getKeluargaUtama() {
        return $this->keluargas()->wherePivot('hubungan_keluarga', 'kepala_keluarga')->first();
    }

    public function getRumahTanggaUtama() {
        return $this->rumahTanggas()->wherePivot('hubungan_rumah_tangga', 'kepala_rumah_tangga')->first();
    }
}
