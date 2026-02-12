<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealisasiAnggaran extends Model
{
    use HasFactory;

    protected $table = 'realisasi_anggaran';

    protected $fillable = [
        'apbdes_id',
        'tanggal',
        'jumlah',
        'keterangan',
        'bukti',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'jumlah' => 'decimal:2',
    ];

    public function apbdes()
    {
        return $this->belongsTo(Apbdes::class, 'apbdes_id');
    }

    public function transaksiKas()
    {
        return $this->hasMany(TransaksiKas::class, 'realisasi_id');
    }
}
