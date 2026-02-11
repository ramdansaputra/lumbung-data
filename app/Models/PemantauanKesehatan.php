<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PemantauanKesehatan extends Model
{
    protected $fillable = [
        'penduduk_id',
        'tanggal',
        'jenis_pemeriksaan',
        'berat_badan',
        'tinggi_badan',
        'status_gizi',
        'status_stunting',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'berat_badan' => 'decimal:2',
        'tinggi_badan' => 'decimal:2',
    ];

    public function penduduk(): BelongsTo
    {
        return $this->belongsTo(Penduduk::class);
    }
}
