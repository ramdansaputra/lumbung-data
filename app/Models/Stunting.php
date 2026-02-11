<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stunting extends Model {
    protected $table = 'stuntings';

    protected $fillable = [
        'penduduk_id',
        'tanggal',
        'berat_badan',
        'tinggi_badan',
        'status_stunting',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'berat_badan' => 'decimal:2',
        'tinggi_badan' => 'decimal:2',
        'lingkar_kepala' => 'decimal:2',
    ];

    public function penduduk(): BelongsTo {
        return $this->belongsTo(Penduduk::class);
    }
}
