<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasDesa extends Model
{
    use HasFactory;

    protected $table = 'kas_desa';

    protected $fillable = [
        'tahun_id',
        'saldo_awal',
        'saldo_akhir',
    ];

    protected $casts = [
        'saldo_awal' => 'decimal:2',
        'saldo_akhir' => 'decimal:2',
    ];

    public function tahunAnggaran()
    {
        return $this->belongsTo(TahunAnggaran::class, 'tahun_id');
    }

    public function transaksiKas()
    {
        return $this->hasMany(TransaksiKas::class, 'kas_id');
    }
}
