<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\Keluarga;
use App\Models\Wilayah;
use App\Models\Artikel;
use App\Models\IdentitasDesa;

class FrontendController extends Controller
{
    public function home()
    {
        // Fetch statistics from database
        $total_penduduk = Penduduk::count();
        $laki_laki = Penduduk::where('jenis_kelamin', 'L')->count();
        $perempuan = Penduduk::where('jenis_kelamin', 'P')->count();
        $total_keluarga = Keluarga::count();
        $total_dusun = Wilayah::distinct('dusun')->count('dusun');
        $total_rt_rw = Wilayah::count();

        // Fetch latest articles (limit to 3 for homepage)
        $artikel = Artikel::latest()->take(3)->get();

        // Fetch village identity
        $identitas_desa = IdentitasDesa::first();

        return view('frontend.home', compact(
            'total_penduduk',
            'laki_laki',
            'perempuan',
            'total_keluarga',
            'total_dusun',
            'total_rt_rw',
            'artikel',
            'identitas_desa'
        ));
    }

    public function berita()
    {
        // Fetch all articles with pagination
        $artikels = Artikel::latest()->paginate(9);

        return view('frontend.artikel', compact('artikels'));
    }

    public function artikelShow($id)
    {
        // Fetch single article
        $artikel = Artikel::findOrFail($id);

        return view('frontend.artikel-detail', compact('artikel'));
    }

    public function profil()
    {
        // Fetch village identity
        $identitas_desa = IdentitasDesa::first();

        // Fetch statistics from database
        $total_penduduk = Penduduk::count();
        $laki_laki = Penduduk::where('jenis_kelamin', 'L')->count();
        $perempuan = Penduduk::where('jenis_kelamin', 'P')->count();
        $total_keluarga = Keluarga::count();
        $total_dusun = Wilayah::distinct('dusun')->count('dusun');
        $total_rt_rw = Wilayah::count();

        return view('frontend.profil', compact(
            'identitas_desa',
            'total_penduduk',
            'laki_laki',
            'perempuan',
            'total_keluarga',
            'total_dusun',
            'total_rt_rw'
        ));
    }

    public function wilayah()
    {
        // Fetch village identity
        $identitas_desa = IdentitasDesa::first();

        // Fetch wilayah data from database
        $wilayahRecords = Wilayah::all();

        $data = [
            'total_dusun' => $wilayahRecords->count(),
            'total_rw' => $wilayahRecords->sum('rw'),
            'total_rt' => $wilayahRecords->sum('rt'),
            'total_kk' => $wilayahRecords->sum('jumlah_kk'),
            'total_penduduk' => $wilayahRecords->sum('jumlah_penduduk'),
            'wilayah' => $wilayahRecords->map(function ($wilayah) {
                return [
                    'nama' => $wilayah->dusun,
                    'kepala_wilayah' => $wilayah->ketua_rw,
                    'rw' => $wilayah->rw,
                    'rt' => $wilayah->rt,
                    'kk' => $wilayah->jumlah_kk,
                    'laki_laki' => $wilayah->laki_laki,
                    'perempuan' => $wilayah->perempuan,
                ];
            })->toArray()
        ];

        return view('frontend.wilayah', compact('identitas_desa', 'data'));
    }
}
