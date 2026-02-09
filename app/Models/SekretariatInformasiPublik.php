<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SekretariatInformasiPublik extends Model {
    use HasFactory;

    protected $table = 'sekretariat_informasi_publik';

    protected $fillable = [
        'judul',
        'ringkasan',
        'kategori',
        'status',
        'file',
        'tanggal_publikasi',
    ];

    protected $casts = [
        'tanggal_publikasi' => 'date',
    ];
}
