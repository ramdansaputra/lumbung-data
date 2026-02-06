<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class KeuanganController extends Controller
{
    public function index()
    {
        return view('admin.keuangan');
    }

    public function laporan()
    {
        return view('admin.keuangan.laporan');
    }

    public function inputData()
    {
        return view('admin.keuangan.input-data');
    }

    public function laporanApbdes()
    {
        return view('admin.keuangan.laporan-apbdes');
    }
}
