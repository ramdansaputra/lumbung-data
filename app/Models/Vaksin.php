<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vaksin extends Model
{
    protected $table = 'vaksins';

    protected $fillable = [
        'penduduk_id',
        'jenis_vaksin',
        'dosis',
        'tanggal_vaksinasi',
        'tempat_vaksinasi',
        'petugas',
        'status',
        'efek_samping',
        'tanggal_jadwal_ulang',
    ];

    protected $casts = [
        'tanggal_vaksinasi' => 'date',
        'tanggal_jadwal_ulang' => 'date',
    ];

    public function penduduk(): BelongsTo
    {
        return $this->belongsTo(Penduduk::class);
    }
}
