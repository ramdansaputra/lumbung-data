<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Sample data for demonstration
        $data = [
            'total_pengaduan' => 127,
            'belum_ditanggapi' => 23,
            'sedang_diproses' => 15,
            'selesai' => 89,
            'pengaduan' => [
                [
                    'id' => 'PGD-2024-001',
                    'nama_pelapor' => 'Ahmad Rahman',
                    'alamat' => 'Jl. Raya No. 45',
                    'kategori' => 'Infrastruktur',
                    'subjek' => 'Jalan Rusak',
                    'deskripsi' => 'Jalan di RT 02 RW 01 mengalami kerusakan parah dan berbahaya untuk dilalui',
                    'status' => 'Belum Ditanggapi',
                    'tanggal' => '2024-01-15',
                    'prioritas' => 'Tinggi'
                ],
                [
                    'id' => 'PGD-2024-002',
                    'nama_pelapor' => 'Siti Aminah',
                    'alamat' => 'Jl. Melati No. 12',
                    'kategori' => 'Kesehatan',
                    'subjek' => 'Posyandu Kurang Bersih',
                    'deskripsi' => 'Fasilitas posyandu perlu perbaikan kebersihan dan peralatan medis',
                    'status' => 'Sedang Diproses',
                    'tanggal' => '2024-01-14',
                    'prioritas' => 'Sedang'
                ],
                [
                    'id' => 'PGD-2024-003',
                    'nama_pelapor' => 'Budi Santoso',
                    'alamat' => 'Jl. Mawar No. 8',
                    'kategori' => 'Keamanan',
                    'subjek' => 'Pencurian Sepeda Motor',
                    'deskripsi' => 'Kejadian pencurian di malam hari, perlu penambahan patroli',
                    'status' => 'Selesai',
                    'tanggal' => '2024-01-12',
                    'prioritas' => 'Tinggi'
                ],
                [
                    'id' => 'PGD-2024-004',
                    'nama_pelapor' => 'Dewi Sartika',
                    'alamat' => 'Jl. Anggrek No. 25',
                    'kategori' => 'Lingkungan',
                    'subjek' => 'Sampah Menumpuk',
                    'deskripsi' => 'Tempat sampah penuh dan tidak diangkut selama seminggu',
                    'status' => 'Belum Ditanggapi',
                    'tanggal' => '2024-01-10',
                    'prioritas' => 'Sedang'
                ],
                [
                    'id' => 'PGD-2024-005',
                    'nama_pelapor' => 'Rina Melati',
                    'alamat' => 'Jl. Kenanga No. 7',
                    'kategori' => 'Administrasi',
                    'subjek' => 'KTP Hilang',
                    'deskripsi' => 'Bantuan pengurusan KTP yang hilang karena kebakaran rumah',
                    'status' => 'Sedang Diproses',
                    'tanggal' => '2024-01-08',
                    'prioritas' => 'Tinggi'
                ]
            ],
            'kategori_stats' => [
                'Infrastruktur' => 35,
                'Kesehatan' => 25,
                'Keamanan' => 20,
                'Lingkungan' => 18,
                'Administrasi' => 15,
                'Lainnya' => 14
            ],
            'status_stats' => [
                'Belum Ditanggapi' => 23,
                'Sedang Diproses' => 15,
                'Selesai' => 89
            ]
        ];

        return view('admin.pengaduan', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pengaduan-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate and store pengaduan
        $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kategori' => 'required|string',
            'subjek' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'prioritas' => 'required|string'
        ]);

        // Implementation for storing pengaduan
        // For now, redirect back with success message
        return redirect()->route('admin.pengaduan.index')
                        ->with('success', 'Pengaduan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find pengaduan by ID
        // For demonstration, return sample data
        $pengaduan = [
            'id' => $id,
            'nama_pelapor' => 'Ahmad Rahman',
            'alamat' => 'Jl. Raya No. 45',
            'kategori' => 'Infrastruktur',
            'subjek' => 'Jalan Rusak',
            'deskripsi' => 'Jalan di RT 02 RW 01 mengalami kerusakan parah dan berbahaya untuk dilalui',
            'status' => 'Belum Ditanggapi',
            'tanggal' => '2024-01-15',
            'prioritas' => 'Tinggi',
            'tanggapan' => null
        ];

        return view('admin.pengaduan-detail', compact('pengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Find pengaduan by ID for editing
        $pengaduan = [
            'id' => $id,
            'nama_pelapor' => 'Ahmad Rahman',
            'alamat' => 'Jl. Raya No. 45',
            'kategori' => 'Infrastruktur',
            'subjek' => 'Jalan Rusak',
            'deskripsi' => 'Jalan di RT 02 RW 01 mengalami kerusakan parah dan berbahaya untuk dilalui',
            'status' => 'Belum Ditanggapi',
            'prioritas' => 'Tinggi'
        ];

        return view('admin.pengaduan-edit', compact('pengaduan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate and update pengaduan
        $request->validate([
            'status' => 'required|string',
            'tanggapan' => 'nullable|string'
        ]);

        // Implementation for updating pengaduan
        // For now, redirect back with success message
        return redirect()->route('admin.pengaduan.index')
                        ->with('success', 'Pengaduan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Implementation for deleting pengaduan
        // For now, redirect back with success message
        return redirect()->route('admin.pengaduan.index')
                        ->with('success', 'Pengaduan berhasil dihapus');
    }

    /**
     * Update status of pengaduan
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:Belum Ditanggapi,Sedang Diproses,Selesai'
        ]);

        // Implementation for updating status
        return redirect()->back()->with('success', 'Status pengaduan berhasil diperbarui');
    }

    /**
     * Add response to pengaduan
     */
    public function addResponse(Request $request, $id)
    {
        $request->validate([
            'tanggapan' => 'required|string'
        ]);

        // Implementation for adding response
        return redirect()->back()->with('success', 'Tanggapan berhasil ditambahkan');
    }
}
