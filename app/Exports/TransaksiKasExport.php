<?php

namespace App\Exports;

use App\Models\TransaksiKas;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TransaksiKasExport implements FromQuery, WithHeadings, WithMapping
{
    protected $tahun;
    protected $bulan;
    protected $jenis;

    public function __construct($tahun = null, $bulan = null, $jenis = null)
    {
        $this->tahun = $tahun;
        $this->bulan = $bulan;
        $this->jenis = $jenis;
    }

    /**
    * @return \Illuminate\Database\Query\Builder
    */
    public function query()
    {
        $query = TransaksiKas::query();

        if ($this->tahun) {
            $query->whereYear('tanggal', $this->tahun);
        }

        if ($this->bulan && $this->bulan !== 'Semua') {
            $query->whereMonth('tanggal', $this->bulan);
        }

        if ($this->jenis && $this->jenis !== 'Semua') {
            if ($this->jenis === 'Pemasukan') {
                $query->where('tipe', 'masuk');
            } elseif ($this->jenis === 'Pengeluaran') {
                $query->where('tipe', 'keluar');
            } elseif ($this->jenis === 'Saldo') {
                // For saldo, show all transactions
            }
        }

        return $query->latest();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Tanggal',
            'Tipe',
            'Keterangan',
            'Kategori',
            'Jumlah',
        ];
    }

    /**
     * @param mixed $row
     * @return array
     */
    public function map($row): array
    {
        return [
            $row->tanggal->format('Y-m-d'),
            $row->tipe === 'masuk' ? 'Pemasukan' : 'Pengeluaran',
            $row->keterangan,
            $row->kategori,
            $row->jumlah,
        ];
    }
}
