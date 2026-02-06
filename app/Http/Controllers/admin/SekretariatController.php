<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SekretariatController extends Controller
{
    /**
     * Display informasi publik page
     */
    public function informasiPublik()
    {
        return view('admin.sekretariat.informasi-publik');
    }

    /**
     * Display inventaris page
     */
    public function inventaris()
    {
        return view('admin.sekretariat.inventaris');
    }

    /**
     * Display klasifikasi surat page
     */
    public function klasifikasiSurat()
    {
        return view('admin.sekretariat.klasifikasi-surat');
    }

    // ============================================
    // INFORMASI PUBLIK METHODS
    // ============================================

    /**
     * Store new informasi publik
     */
    public function storeInformasiPublik(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string',
            'isi' => 'required|string',
            'tanggal_publikasi' => 'required|date',
            'status' => 'required|in:draft,published',
        ]);

        // TODO: Simpan informasi publik ke database
        // Example: InformasiPublik::create($validated);

        return redirect()->route('admin.sekretariat.informasi-publik')
            ->with('success', 'Informasi publik berhasil ditambahkan');
    }

    /**
     * Update informasi publik
     */
    public function updateInformasiPublik(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string',
            'isi' => 'required|string',
            'tanggal_publikasi' => 'required|date',
            'status' => 'required|in:draft,published',
        ]);

        // TODO: Update informasi publik di database
        // Example: InformasiPublik::findOrFail($id)->update($validated);

        return redirect()->route('admin.sekretariat.informasi-publik')
            ->with('success', 'Informasi publik berhasil diperbarui');
    }

    /**
     * Delete informasi publik
     */
    public function destroyInformasiPublik($id)
    {
        // TODO: Hapus informasi publik dari database
        // Example: InformasiPublik::findOrFail($id)->delete();

        return redirect()->route('admin.sekretariat.informasi-publik')
            ->with('success', 'Informasi publik berhasil dihapus');
    }

    // ============================================
    // INVENTARIS METHODS
    // ============================================

    /**
     * Store new inventaris
     */
    public function storeInventaris(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string',
            'jumlah' => 'required|integer|min:1',
            'kondisi' => 'required|in:baik,rusak,perlu_perbaikan',
            'lokasi' => 'required|string',
            'tanggal_perolehan' => 'required|date',
            'harga_perolehan' => 'nullable|numeric|min:0',
        ]);

        // TODO: Simpan inventaris ke database
        // Example: Inventaris::create($validated);

        return redirect()->route('admin.sekretariat.inventaris')
            ->with('success', 'Inventaris berhasil ditambahkan');
    }

    /**
     * Update inventaris
     */
    public function updateInventaris(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string',
            'jumlah' => 'required|integer|min:1',
            'kondisi' => 'required|in:baik,rusak,perlu_perbaikan',
            'lokasi' => 'required|string',
            'tanggal_perolehan' => 'required|date',
            'harga_perolehan' => 'nullable|numeric|min:0',
        ]);

        // TODO: Update inventaris di database
        // Example: Inventaris::findOrFail($id)->update($validated);

        return redirect()->route('admin.sekretariat.inventaris')
            ->with('success', 'Inventaris berhasil diperbarui');
    }

    /**
     * Delete inventaris
     */
    public function destroyInventaris($id)
    {
        // TODO: Hapus inventaris dari database
        // Example: Inventaris::findOrFail($id)->delete();

        return redirect()->route('admin.sekretariat.inventaris')
            ->with('success', 'Inventaris berhasil dihapus');
    }

    // ============================================
    // KLASIFIKASI SURAT METHODS
    // ============================================

    /**
     * Store new klasifikasi surat
     */
    public function storeKlasifikasiSurat(Request $request)
    {
        $validated = $request->validate([
            'kode_klasifikasi' => 'required|string|max:50|unique:klasifikasi_surat',
            'nama_klasifikasi' => 'required|string|max:255',
            'kategori' => 'required|string',
            'uraian' => 'required|string',
            'retensi_aktif' => 'required|integer|min:1',
            'retensi_inaktif' => 'required|integer|min:1',
        ]);

        // TODO: Simpan klasifikasi surat ke database
        // Example: KlasifikasiSurat::create($validated);

        return redirect()->route('admin.sekretariat.klasifikasi-surat')
            ->with('success', 'Klasifikasi surat berhasil ditambahkan');
    }

    /**
     * Update klasifikasi surat
     */
    public function updateKlasifikasiSurat(Request $request, $id)
    {
        $validated = $request->validate([
            'kode_klasifikasi' => 'required|string|max:50|unique:klasifikasi_surat,kode_klasifikasi,'.$id,
            'nama_klasifikasi' => 'required|string|max:255',
            'kategori' => 'required|string',
            'uraian' => 'required|string',
            'retensi_aktif' => 'required|integer|min:1',
            'retensi_inaktif' => 'required|integer|min:1',
        ]);

        // TODO: Update klasifikasi surat di database
        // Example: KlasifikasiSurat::findOrFail($id)->update($validated);

        return redirect()->route('admin.sekretariat.klasifikasi-surat')
            ->with('success', 'Klasifikasi surat berhasil diperbarui');
    }

    /**
     * Delete klasifikasi surat
     */
    public function destroyKlasifikasiSurat($id)
    {
        // TODO: Hapus klasifikasi surat dari database
        // Example: KlasifikasiSurat::findOrFail($id)->delete();

        return redirect()->route('admin.sekretariat.klasifikasi-surat')
            ->with('success', 'Klasifikasi surat berhasil dihapus');
    }

    // ============================================
    // EXPORT METHODS
    // ============================================

    /**
     * Export data to Excel
     */
    public function export($type)
    {
        // TODO: Implement export functionality
        // Example using Laravel Excel:
        // return Excel::download(new SekretariatExport($type), "sekretariat-{$type}.xlsx");

        return redirect()->back()
            ->with('info', 'Fitur export dalam pengembangan');
    }

    /**
     * Print report
     */
    public function print($type)
    {
        // TODO: Generate PDF report
        // Example:
        // $pdf = PDF::loadView("admin.sekretariat.print-{$type}");
        // return $pdf->stream("laporan-{$type}.pdf");

        return redirect()->back()
            ->with('info', 'Fitur cetak dalam pengembangan');
    }
}
