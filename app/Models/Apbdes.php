<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apbdes extends Model
{
    use HasFactory;

    protected $table = 'apbdes';

    protected $fillable = [
        'tahun_id',
        'kegiatan_id',
        'sumber_dana_id',
        'anggaran',
        'keterangan',
    ];

    protected $casts = [
        'anggaran' => 'decimal:2',
    ];

    /**
     * Relasi dengan TahunAnggaran
     */
    public function tahunAnggaran()
    {
        return $this->belongsTo(TahunAnggaran::class, 'tahun_id');
    }

    /**
     * Relasi dengan KegiatanAnggaran
     */
    public function kegiatanAnggaran()
    {
        return $this->belongsTo(KegiatanAnggaran::class, 'kegiatan_id');
    }

    /**
     * Relasi dengan SumberDana
     */
    public function sumberDana()
    {
        return $this->belongsTo(SumberDana::class, 'sumber_dana_id');
    }

    /**
     * Relasi dengan RealisasiAnggaran (one to many)
     */
    public function realisasiAnggaran()
    {
        return $this->hasMany(RealisasiAnggaran::class, 'apbdes_id');
    }

    /**
     * Accessor untuk mendapatkan total realisasi
     */
    public function getRealisasiAttribute()
    {
        return $this->realisasiAnggaran()->sum('jumlah');
    }

    /**
     * Accessor untuk mendapatkan persentase realisasi
     */
    public function getPersentaseRealisasiAttribute()
    {
        if ($this->anggaran > 0) {
            return round(($this->realisasi / $this->anggaran) * 100, 1);
        }
        return 0;
    }

    /**
     * Accessor untuk mendapatkan sisa anggaran
     */
    public function getSisaAnggaranAttribute()
    {
        return $this->anggaran - $this->realisasi;
    }

    /**
     * Scope untuk filter pendapatan
     */
    public function scopePendapatan($query)
    {
        return $query->whereHas('kegiatanAnggaran.bidangAnggaran', function($q) {
            $q->where('nama_bidang', 'like', '%pendapatan%');
        });
    }

    /**
     * Scope untuk filter belanja
     */
    public function scopeBelanja($query)
    {
        return $query->whereHas('kegiatanAnggaran.bidangAnggaran', function($q) {
            $q->where('nama_bidang', 'not like', '%pendapatan%');
        });
    }

    /**
     * Scope untuk filter berdasarkan tahun
     */
    public function scopeByTahun($query, $tahun)
    {
        return $query->whereHas('tahunAnggaran', function($q) use ($tahun) {
            $q->where('tahun', $tahun);
        });
    }
}