<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KesehatanController extends Controller
{
    /**
     * Display pendataan kesehatan page
     */
    public function pendataan()
    {
        return view('admin.kesehatan.pendataan');
    }

    /**
     * Display pemantauan kesehatan page
     */
    public function pemantauan()
    {
        return view('admin.kesehatan.pemantauan');
    }

    /**
     * Display vaksin page
     */
    public function vaksin()
    {
        return view('admin.kesehatan.vaksin');
    }

    /**
     * Display stunting page
     */
    public function stunting()
    {
        return view('admin.kesehatan.stunting');
    }

    // ============================================
    // PENDATAAN METHODS
    // ============================================

    /**
     * Store new health data
     */
    public function storePendataan(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'nik' => 'required|string|max:16',
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'kelurahan' => 'required|string',
            'status_kesehatan' => 'required|string',
        ]);

        // TODO: Simpan data ke database
        // Example: Pendataan::create($validated);

        return redirect()->route('admin.kesehatan.pendataan')
            ->with('success', 'Data kesehatan berhasil ditambahkan');
    }

    /**
     * Update health data
     */
    public function updatePendataan(Request $request, $id)
    {
        // Validasi data
        $validated = $request->validate([
            'nik' => 'required|string|max:16',
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'kelurahan' => 'required|string',
            'status_kesehatan' => 'required|string',
        ]);

        // TODO: Update data di database
        // Example: Pendataan::findOrFail($id)->update($validated);

        return redirect()->route('admin.kesehatan.pendataan')
            ->with('success', 'Data kesehatan berhasil diperbarui');
    }

    /**
     * Delete health data
     */
    public function destroyPendataan($id)
    {
        // TODO: Hapus data dari database
        // Example: Pendataan::findOrFail($id)->delete();

        return redirect()->route('admin.kesehatan.pendataan')
            ->with('success', 'Data kesehatan berhasil dihapus');
    }

    // ============================================
    // PEMANTAUAN METHODS
    // ============================================

    /**
     * Store new monitoring data
     */
    public function storePemantauan(Request $request)
    {
        $validated = $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'jenis_pemantauan' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'frekuensi' => 'required|string',
            'petugas' => 'required|string',
            'status' => 'required|in:aktif,tindak_lanjut,selesai',
        ]);

        // TODO: Simpan data pemantauan
        // Example: Pemantauan::create($validated);

        return redirect()->route('admin.kesehatan.pemantauan')
            ->with('success', 'Data pemantauan berhasil ditambahkan');
    }

    /**
     * Update monitoring data
     */
    public function updatePemantauan(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'jenis_pemantauan' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'frekuensi' => 'required|string',
            'petugas' => 'required|string',
            'status' => 'required|in:aktif,tindak_lanjut,selesai',
        ]);

        // TODO: Update data pemantauan
        // Example: Pemantauan::findOrFail($id)->update($validated);

        return redirect()->route('admin.kesehatan.pemantauan')
            ->with('success', 'Data pemantauan berhasil diperbarui');
    }

    /**
     * Record monitoring activity
     */
    public function rekamPemantauan(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal_rekam' => 'required|date',
            'catatan' => 'required|string',
            'hasil_pemeriksaan' => 'required|string',
        ]);

        // TODO: Simpan data rekaman pemantauan
        // Example: RekamanPemantauan::create($validated);

        return redirect()->route('admin.kesehatan.pemantauan')
            ->with('success', 'Rekaman pemantauan berhasil ditambahkan');
    }

    // ============================================
    // VAKSIN METHODS
    // ============================================

    /**
     * Store new vaccination data
     */
    public function storeVaksin(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|string|max:16',
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'jenis_vaksin' => 'required|string',
            'dosis' => 'required|string',
            'tanggal_vaksinasi' => 'required|date',
            'status' => 'required|string',
        ]);

        // TODO: Simpan data vaksinasi
        // Example: Vaksin::create($validated);

        return redirect()->route('admin.kesehatan.vaksin')
            ->with('success', 'Data vaksinasi berhasil ditambahkan');
    }

    /**
     * Update vaccination data
     */
    public function updateVaksin(Request $request, $id)
    {
        $validated = $request->validate([
            'nik' => 'required|string|max:16',
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'jenis_vaksin' => 'required|string',
            'dosis' => 'required|string',
            'tanggal_vaksinasi' => 'required|date',
            'status' => 'required|string',
        ]);

        // TODO: Update data vaksinasi
        // Example: Vaksin::findOrFail($id)->update($validated);

        return redirect()->route('admin.kesehatan.vaksin')
            ->with('success', 'Data vaksinasi berhasil diperbarui');
    }

    /**
     * Generate vaccination card
     */
    public function cetakKartuVaksin($id)
    {
        // TODO: Generate PDF kartu vaksin
        // Example: 
        // $data = Vaksin::findOrFail($id);
        // $pdf = PDF::loadView('admin.kesehatan.kartu-vaksin', compact('data'));
        // return $pdf->download('kartu-vaksin-'.$id.'.pdf');

        return redirect()->route('admin.kesehatan.vaksin')
            ->with('info', 'Fitur cetak kartu vaksin dalam pengembangan');
    }

    // ============================================
    // STUNTING METHODS
    // ============================================

    /**
     * Store new stunting data
     */
    public function storeStunting(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|string|max:16',
            'nama_balita' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'berat_badan' => 'required|numeric|min:0',
            'tinggi_badan' => 'required|numeric|min:0',
            'lingkar_kepala' => 'required|numeric|min:0',
            'status_gizi' => 'required|in:normal,stunting,resiko,gizi_buruk',
        ]);

        // TODO: Simpan data stunting dan hitung status gizi
        // Example: Stunting::create($validated);

        return redirect()->route('admin.kesehatan.stunting')
            ->with('success', 'Data balita berhasil ditambahkan');
    }

    /**
     * Update stunting data
     */
    public function updateStunting(Request $request, $id)
    {
        $validated = $request->validate([
            'nik' => 'required|string|max:16',
            'nama_balita' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'berat_badan' => 'required|numeric|min:0',
            'tinggi_badan' => 'required|numeric|min:0',
            'lingkar_kepala' => 'required|numeric|min:0',
            'status_gizi' => 'required|in:normal,stunting,resiko,gizi_buruk',
        ]);

        // TODO: Update data stunting
        // Example: Stunting::findOrFail($id)->update($validated);

        return redirect()->route('admin.kesehatan.stunting')
            ->with('success', 'Data balita berhasil diperbarui');
    }

    /**
     * Record new measurement
     */
    public function ukurStunting(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal_ukur' => 'required|date',
            'berat_badan' => 'required|numeric|min:0',
            'tinggi_badan' => 'required|numeric|min:0',
            'lingkar_kepala' => 'required|numeric|min:0',
        ]);

        // TODO: Simpan data pengukuran baru dan update status
        // Example: PengukuranStunting::create($validated);

        return redirect()->route('admin.kesehatan.stunting')
            ->with('success', 'Pengukuran berhasil dicatat');
    }

    /**
     * Generate stunting analysis report
     */
    public function laporanAnalisis()
    {
        // TODO: Generate laporan analisis stunting
        // Example:
        // $data = Stunting::with('pengukuran')->get();
        // $pdf = PDF::loadView('admin.kesehatan.laporan-stunting', compact('data'));
        // return $pdf->download('laporan-analisis-stunting.pdf');

        return redirect()->route('admin.kesehatan.stunting')
            ->with('info', 'Fitur laporan analisis dalam pengembangan');
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
        // return Excel::download(new KesehatanExport($type), "kesehatan-{$type}.xlsx");

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
        // $pdf = PDF::loadView("admin.kesehatan.print-{$type}");
        // return $pdf->stream("laporan-{$type}.pdf");

        return redirect()->back()
            ->with('info', 'Fitur cetak dalam pengembangan');
    }
}