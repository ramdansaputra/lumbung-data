<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class StatistikController extends Controller
{
    public function index()
    {
        // Dummy data (nanti bisa ganti dari database)
        $data = [
            'total_penduduk' => 1240,
            'laki_laki'      => 640,
            'perempuan'      => 600,
            'kepala_keluarga'=> 320,
            'rt'             => 12,
            'rw'             => 4,
            'usia' => [
                'balita' => 120,
                'remaja' => 260,
                'dewasa' => 640,
                'lansia' => 220
            ]
        ];

        return view('admin.statistik', compact('data'));
    }
}
