<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiKas extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'transaksi_kas';

    protected $fillable = [
        'tanggal',
        'tipe',
        'jumlah',
        'keterangan',
        'kategori',
        'nomor_bukti',
        'lampiran',
        'realisasi_anggaran_id',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'jumlah' => 'decimal:2',
    ];

    protected $dates = [
        'tanggal',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Relasi dengan RealisasiAnggaran
     */
    public function realisasiAnggaran()
    {
        return $this->belongsTo(RealisasiAnggaran::class, 'realisasi_anggaran_id');
    }

    /**
     * Scope untuk filter berdasarkan tahun
     */
    public function scopeByYear($query, $year)
    {
        return $query->whereYear('tanggal', $year);
    }

    /**
     * Scope untuk filter berdasarkan bulan
     */
    public function scopeByMonth($query, $month)
    {
        return $query->whereMonth('tanggal', $month);
    }

    /**
     * Scope untuk transaksi masuk (pemasukan)
     */
    public function scopeMasuk($query)
    {
        return $query->where('tipe', 'masuk');
    }

    /**
     * Scope untuk transaksi keluar (pengeluaran)
     */
    public function scopeKeluar($query)
    {
        return $query->where('tipe', 'keluar');
    }

    /**
     * Accessor untuk format jumlah dengan Rupiah
     */
    public function getJumlahFormattedAttribute()
    {
        return 'Rp ' . number_format($this->jumlah, 0, ',', '.');
    }

    /**
     * Accessor untuk label tipe
     */
    public function getTipeLabelAttribute()
    {
        return $this->tipe === 'masuk' ? 'Pemasukan' : 'Pengeluaran';
    }
}