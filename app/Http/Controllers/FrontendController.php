<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\Keluarga;
use App\Models\Wilayah;
use App\Models\Artikel;
use App\Models\IdentitasDesa;
use App\Models\KategoriKonten;

class FrontendController extends Controller
{
    public function home()
    {
        // ======================
        // DATA DASAR
        // ======================

        $total_penduduk = Penduduk::count();
        $laki_laki = Penduduk::where('jenis_kelamin', 'L')->count();
        $perempuan = Penduduk::where('jenis_kelamin', 'P')->count();
        $total_keluarga = Keluarga::count();
        $total_dusun = Wilayah::distinct('dusun')->count('dusun');
        $total_rt_rw = Wilayah::count();

        $artikel = Artikel::latest()->take(3)->get();
        $identitas_desa = IdentitasDesa::first() ?? new IdentitasDesa();

        // ======================
        // FORMAT UNTUK BLADE AI
        // ======================

        $desaInfo = [
            'nama_desa' => optional($identitas_desa)->nama_desa,
            'kecamatan' => optional($identitas_desa)->kecamatan,
            'kabupaten' => optional($identitas_desa)->kabupaten,
            'provinsi' => optional($identitas_desa)->provinsi,
            'email_desa' => optional($identitas_desa)->email,
            'telepon_desa' => optional($identitas_desa)->telepon,
            'alamat_kantor' => optional($identitas_desa)->alamat,
            'gambar_kantor' => optional($identitas_desa)->logo,
        ];

        $statistik = [
            [
                'label' => 'Total Penduduk',
                'value' => $total_penduduk,
                'icon' => 'users',
                'color' => 'emerald'
            ],
            [
                'label' => 'Laki-laki',
                'value' => $laki_laki,
                'icon' => 'user',
                'color' => 'blue'
            ],
            [
                'label' => 'Perempuan',
                'value' => $perempuan,
                'icon' => 'user',
                'color' => 'pink'
            ],
            [
                'label' => 'Total Keluarga',
                'value' => $total_keluarga,
                'icon' => 'home',
                'color' => 'orange'
            ],
        ];

        $artikelTerbaru = $artikel->map(function ($item) {
            return [
                'title' => $item->judul,
                'excerpt' => \Str::limit(strip_tags($item->isi), 100),
                'date' => $item->created_at->format('d M Y'),
                'category' => 'Berita',
                'image' => $item->gambar ?? null,
                'id' => $item->id,
                'author' => 'Admin'
            ];
        });

        $perangkatUtama = []; // nanti kita isi kalau ada tabel perangkat

        return view('frontend.pages.home', compact(
            'desaInfo',
            'statistik',
            'artikelTerbaru',
            'perangkatUtama'
        ));
    }

    public function berita()
    {
        $artikels = Artikel::orderBy('created_at', 'desc')->get();
        $kategoriBlog = KategoriKonten::all();

        $artikelList = $artikels->map(function ($item) {
            return [
                'title' => $item->judul,
                'excerpt' => \Str::limit(strip_tags($item->isi), 120),
                'date' => $item->created_at,
                'category' => 'Berita',
                'image' => $item->gambar ?? 'https://via.placeholder.com/400x300',
                'id' => $item->id,
                'author' => 'Admin',
                'views' => $item->views ?? 0,
            ];
        });

        $kategoriBlog = [
            'semua' => 'Semua',
            'berita' => 'Berita',
            'pengumuman' => 'Pengumuman',
            'kegiatan' => 'Kegiatan',
        ];

        return view('frontend.pages.artikel.index', compact('artikels','kategoriBlog', 'artikelList'));
    }

    public function artikelShow($id)
    {
        // Fetch single article
        $artikel = Artikel::findOrFail($id);

        return view('frontend.pages.artikel.show', compact('artikel'));
    }

    public function profil()
    {
        $identitas_desa = IdentitasDesa::first() ?? new IdentitasDesa();

        $profil = [
            'nama_desa' => $identitas_desa->nama_desa,
            'kode_desa' => $identitas_desa->kode_desa ?? '-',
            'kecamatan' => $identitas_desa->kecamatan,
            'kabupaten' => $identitas_desa->kabupaten,
            'provinsi' => $identitas_desa->provinsi,
            'email_desa' => $identitas_desa->email,
            'telepon_desa' => $identitas_desa->telepon,
            'alamat_kantor' => $identitas_desa->alamat,
            'gambar_kantor' => $identitas_desa->logo,
            'latitude' => $identitas_desa->latitude ?? '-',
            'longitude' => $identitas_desa->longitude ?? '-',
        ];

        $deskripsi = $identitas_desa->deskripsi ?? 'Deskripsi desa belum tersedia.';

        $infoDesa = [
            [
                'label' => 'Total Penduduk',
                'value' => Penduduk::count(),
                'icon' => 'users'
            ],
            [
                'label' => 'Laki-laki',
                'value' => Penduduk::where('jenis_kelamin', 'L')->count(),
                'icon' => 'user'
            ],
            [
                'label' => 'Perempuan',
                'value' => Penduduk::where('jenis_kelamin', 'P')->count(),
                'icon' => 'user'
            ],
            [
                'label' => 'Total Keluarga',
                'value' => Keluarga::count(),
                'icon' => 'home'
            ],
        ];

        $visiMisi = [
            'visi' => $identitas_desa->visi ?? 'Visi desa belum tersedia.',
            'misi' => $identitas_desa->misi 
                ? explode("\n", $identitas_desa->misi)
                : ['Misi desa belum tersedia.']
        ];

        return view('frontend.pages.profil.index', compact(
            'profil',
            'deskripsi',
            'infoDesa',
            'visiMisi'
        ));
    }

    public function profilKepalaDesa()
    {
        $identitas_desa = \App\Models\IdentitasDesa::first();

        return view('frontend.pages.profil.kepala-desa', compact('identitas_desa'));
    }

    public function pemerintahan()
    {
        $pemerintahan = [
            'struktur' => [
                [
                    'kategori' => 'Kepala Desa & Sekretariat',
                    'anggota' => [
                        [
                            'posisi' => 'Kepala Desa',
                            'nama' => 'Nama Kepala Desa',
                            'nip' => '123456789',
                            'status' => 'Aktif'
                        ],
                        [
                            'posisi' => 'Sekretaris Desa',
                            'nama' => 'Nama Sekretaris',
                            'nip' => '987654321',
                            'status' => 'Aktif'
                        ],
                    ]
                ],
            ]
        ];

        $badan_permusyawaratan = [
            [
                'posisi' => 'Ketua',
                'nama' => 'Nama Ketua BPD',
                'wilayah' => 'Dusun 1'
            ],
            [
                'posisi' => 'Anggota',
                'nama' => 'Nama Anggota BPD',
                'wilayah' => 'Dusun 2'
            ],
        ];

        return view('frontend.pages.pemerintahan.index', compact(
            'pemerintahan',
            'badan_permusyawaratan'
        ));
    }

    public function dataDesa()
    {
        // Statistik Penduduk
        $statistikPenduduk = [
            [
                'label' => 'Total Penduduk',
                'value' => Penduduk::count(),
                'color' => 'emerald'
            ],
            [
                'label' => 'Laki-laki',
                'value' => Penduduk::where('jenis_kelamin', 'L')->count(),
                'color' => 'blue'
            ],
            [
                'label' => 'Perempuan',
                'value' => Penduduk::where('jenis_kelamin', 'P')->count(),
                'color' => 'pink'
            ],
            [
                'label' => 'Total Keluarga',
                'value' => Keluarga::count(),
                'color' => 'orange'
            ],
        ];

        // Dummy dulu supaya tidak error
        $statistikPendidikan = [];
        $statistikPekerjaan = [];
        $asetDesa = [];
        $anggaranDesa = [
            'tahun' => date('Y'),
            'total_anggaran' => 'Rp 0',
            'sumber_dana' => []
        ];

        return view('frontend.pages.data-desa.index', compact(
            'statistikPenduduk',
            'statistikPendidikan',
            'statistikPekerjaan',
            'asetDesa',
            'anggaranDesa'
        ));
    }

    public function wilayah()
    {
        $wilayahRecords = Wilayah::all();

        // Statistik untuk card
        $statistik = [
            [
                'label' => 'Total Dusun',
                'value' => $wilayahRecords->count(),
                'icon' => 'map'
            ],
            [
                'label' => 'Total RW',
                'value' => $wilayahRecords->sum('rw'),
                'icon' => 'users'
            ],
            [
                'label' => 'Total RT',
                'value' => $wilayahRecords->sum('rt'),
                'icon' => 'home'
            ],
            [
                'label' => 'Total Penduduk',
                'value' => $wilayahRecords->sum('jumlah_penduduk'),
                'icon' => 'user'
            ],
        ];

        // Format data untuk list wilayah
        $wilayahList = $wilayahRecords->map(function ($wilayah) {
            return [
                'id' => $wilayah->id,
                'nama' => $wilayah->dusun,
                'deskripsi' => 'Dusun ' . $wilayah->dusun,
                'kepala_dusun' => $wilayah->ketua_rw ?? '-',
                'jumlah_rw' => $wilayah->rw,
                'jumlah_rt' => $wilayah->rt,
                'jumlah_penduduk' => $wilayah->jumlah_penduduk,
                'icon' => '🏘️'
            ];
        });

        return view('frontend.pages.wilayah.index', compact(
            'statistik',
            'wilayahList'
        ));
    }

    public function wilayahShow($id)
    {
        $wilayah = Wilayah::findOrFail($id);

        return view('frontend.pages.wilayah.show', compact('wilayah'));
    }

    public function kontak()
    {
        $infoKontak = [
            'alamat' => 'Jl. Contoh No. 123',
            'telepon' => '08123456789',
            'email' => 'desa@email.com',
            'jam_operasional' => 'Senin - Jumat, 08.00 - 15.00',
            'latitude' => '-7.123456',
            'longitude' => '109.123456',
        ];

        $departemen = [
            [
                'nama' => 'Pelayanan Umum',
                'penanggung_jawab' => 'Budi Santoso',
                'telepon' => '081234567890',
                'email' => 'pelayanan@desa.com'
            ]
        ];

        return view('frontend.pages.kontak.index', compact('infoKontak', 'departemen'));
    }

    // use Illuminate\Http\Request;

    public function storeKontak(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string',
        ]);

        // Untuk sekarang kita hanya redirect dulu
        // Nanti bisa disimpan ke database / kirim email

        return redirect()->route('kontak')
            ->with('success', 'Pesan berhasil dikirim. Terima kasih!');
    }
}
