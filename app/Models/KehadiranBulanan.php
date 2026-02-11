<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KehadiranBulanan extends Model {
    use HasFactory;

    protected $table = 'kehadiran_bulanan';

    protected $fillable = [
        'id_pegawai',
        'bulan',
        'tahun',
        'jumlah_hadir',
        'jumlah_izin',
        'jumlah_alpha',
        'jumlah_dinas_luar',
        'total_hari_kerja',
        'presentase_kehadiran',
    ];

    protected $casts = [
        'presentase_kehadiran' => 'decimal:2',
    ];

    // Relasi ke pegawai
    public function pegawai() {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }
}
    