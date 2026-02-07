<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\Keluarga;
use App\Models\Wilayah;
use Carbon\Carbon;

class StatistikController extends Controller
{
    public function index()
    {
        // Ambil data penduduk hidup
        $penduduks = Penduduk::where('status_hidup', 'hidup')
            ->select('tanggal_lahir', 'jenis_kelamin', 'pendidikan', 'pekerjaan', 'status_perkawinan')
            ->get();

        // Total & gender
        $total_penduduk = $penduduks->count();
        $laki_laki = $penduduks->where('jenis_kelamin', 'Laki-laki')->count();
        $perempuan = $penduduks->where('jenis_kelamin', 'Perempuan')->count();

        // Kelompok umur menggunakan Carbon
        $usia = [
            '0_5' => 0,    // 0-5
            '6_17' => 0,   // 6-17
            '18_59' => 0,  // 18-59
            '60_plus' => 0 // 60+
        ];

        foreach ($penduduks as $p) {
            if (!$p->tanggal_lahir) {
                continue;
            }
            try {
                $age = Carbon::parse($p->tanggal_lahir)->age;
            } catch (\Exception $e) {
                continue;
            }

            if ($age <= 5) {
                $usia['0_5']++;
            } elseif ($age >= 6 && $age <= 17) {
                $usia['6_17']++;
            } elseif ($age >= 18 && $age <= 59) {
                $usia['18_59']++;
            } else {
                $usia['60_plus']++;
            }
        }

        // Pendidikan (aggregasi)
        $pendidikan_data = Penduduk::where('status_hidup', 'hidup')
            ->groupBy('pendidikan')
            ->selectRaw('pendidikan as label, COUNT(*) as jumlah')
            ->orderByRaw('jumlah DESC')
            ->get()
            ->toArray();

        $pendidikan = [];
        foreach ($pendidikan_data as $item) {
            if (isset($item['label']) && $item['label'] !== null && $item['label'] !== '') {
                $pendidikan[] = [
                    'label' => ucfirst($item['label']),
                    'jumlah' => (int) $item['jumlah']
                ];
            }
        }

        // Pekerjaan (aggregasi)
        $pekerjaan_data = Penduduk::where('status_hidup', 'hidup')
            ->groupBy('pekerjaan')
            ->selectRaw('pekerjaan as label, COUNT(*) as jumlah')
            ->orderByRaw('jumlah DESC')
            ->get()
            ->toArray();

        $pekerjaan = [];
        foreach ($pekerjaan_data as $item) {
            if (isset($item['label']) && $item['label'] !== null && $item['label'] !== '') {
                $pekerjaan[] = [
                    'label' => ucfirst($item['label']),
                    'jumlah' => (int) $item['jumlah']
                ];
            }
        }

        // Status Perkawinan (aggregasi)
        $status_nikah_data = Penduduk::where('status_hidup', 'hidup')
            ->groupBy('status_perkawinan')
            ->selectRaw('status_perkawinan as label, COUNT(*) as jumlah')
            ->orderByRaw('jumlah DESC')
            ->get()
            ->toArray();

        $status_perkawinan = [];
        foreach ($status_nikah_data as $item) {
            if (isset($item['label']) && $item['label'] !== null && $item['label'] !== '') {
                $status_perkawinan[] = [
                    'label' => ucfirst($item['label']),
                    'jumlah' => (int) $item['jumlah']
                ];
            }
        }

        $data = [
            'total_penduduk' => (int) $total_penduduk,
            'laki_laki' => (int) $laki_laki,
            'perempuan' => (int) $perempuan,
            'kepala_keluarga' => Keluarga::count(),
            'rt' => Wilayah::whereNotNull('rt')->where('rt', '!=', '')->distinct('rt')->count('rt'),
            'rw' => Wilayah::whereNotNull('rw')->where('rw', '!=', '')->distinct('rw')->count('rw'),
            'usia' => [
                '0_5' => $usia['0_5'],
                '6_17' => $usia['6_17'],
                '18_59' => $usia['18_59'],
                '60_plus' => $usia['60_plus'],
            ],
            'pendidikan' => $pendidikan,
            'pekerjaan' => $pekerjaan,
            'status_perkawinan' => $status_perkawinan,
        ];

        return view('admin.statistik.statistik', compact('data'));
    }

    public function kependudukan()
    {
        // Total & Gender Statistics
        $total_penduduk = Penduduk::where('status_hidup', 'hidup')->count();
        $laki_laki = Penduduk::where('status_hidup', 'hidup')
            ->where('jenis_kelamin', 'Laki-laki')
            ->count();
        $perempuan = $total_penduduk - $laki_laki;

        // Kepala Keluarga (head of family)
        $kepala_keluarga = Keluarga::count();

        // RT & RW count (distinct values)
        $rt = Wilayah::whereNotNull('rt')
            ->where('rt', '!=', '')
            ->distinct('rt')
            ->count('rt');
        $rw = Wilayah::whereNotNull('rw')
            ->where('rw', '!=', '')
            ->distinct('rw')
            ->count('rw');

        // Age Distribution
        $today = Carbon::now();
        $balita = Penduduk::where('status_hidup', 'hidup')
            ->whereRaw('YEAR(FROM_DAYS(DATEDIFF(now(),tanggal_lahir))) < 5')
            ->count();
        $remaja = Penduduk::where('status_hidup', 'hidup')
            ->whereRaw('YEAR(FROM_DAYS(DATEDIFF(now(),tanggal_lahir))) BETWEEN 5 AND 18')
            ->count();
        $dewasa = Penduduk::where('status_hidup', 'hidup')
            ->whereRaw('YEAR(FROM_DAYS(DATEDIFF(now(),tanggal_lahir))) BETWEEN 19 AND 59')
            ->count();
        $lansia = Penduduk::where('status_hidup', 'hidup')
            ->whereRaw('YEAR(FROM_DAYS(DATEDIFF(now(),tanggal_lahir))) >= 60')
            ->count();

        // Education Level
        $pendidikan_data = Penduduk::select('pendidikan')
            ->where('status_hidup', 'hidup')
            ->groupBy('pendidikan')
            ->selectRaw('pendidikan as label, COUNT(*) as jumlah')
            ->get()
            ->toArray();

        $pendidikan = [];
        foreach ($pendidikan_data as $item) {
            if ($item['label'] && $item['label'] !== '') {
                $pendidikan[] = [
                    'label' => ucfirst($item['label']),
                    'jumlah' => $item['jumlah']
                ];
            }
        }

        // Occupation
        $pekerjaan_data = Penduduk::select('pekerjaan')
            ->where('status_hidup', 'hidup')
            ->groupBy('pekerjaan')
            ->selectRaw('pekerjaan as label, COUNT(*) as jumlah')
            ->get()
            ->toArray();

        $pekerjaan = [];
        foreach ($pekerjaan_data as $item) {
            if ($item['label'] && $item['label'] !== '') {
                $pekerjaan[] = [
                    'label' => ucfirst($item['label']),
                    'jumlah' => $item['jumlah']
                ];
            }
        }

        // Religion
        $agama_data = Penduduk::select('agama')
            ->where('status_hidup', 'hidup')
            ->groupBy('agama')
            ->selectRaw('agama as label, COUNT(*) as jumlah')
            ->get()
            ->toArray();

        $agama = [];
        foreach ($agama_data as $item) {
            if ($item['label'] && $item['label'] !== '') {
                $agama[] = [
                    'label' => ucfirst($item['label']),
                    'jumlah' => $item['jumlah']
                ];
            }
        }

        $data = [
            'total_penduduk'  => $total_penduduk,
            'laki_laki'       => $laki_laki,
            'perempuan'       => $perempuan,
            'kepala_keluarga' => $kepala_keluarga,
            'rt'              => $rt,
            'rw'              => $rw,
            'usia' => [
                'balita' => $balita,
                'remaja' => $remaja,
                'dewasa' => $dewasa,
                'lansia' => $lansia,
            ],
            'pendidikan' => $pendidikan,
            'pekerjaan' => $pekerjaan,
            'agama' => $agama,
        ];

        return view('admin.statistik.kependudukan', compact('data'));
    }
}
