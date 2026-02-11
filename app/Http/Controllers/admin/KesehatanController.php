<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PendataanKesehatan;
use App\Models\PemantauanKesehatan;
use App\Models\Vaksin;
use App\Models\Stunting;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class KesehatanController extends Controller
{
    /**
     * Display pendataan kesehatan page
     */
    public function pendataan()
    {
        $data = PendataanKesehatan::with('penduduk')->paginate(10);
        $penduduk = Penduduk::select('id', 'nama', 'nik', 'tanggal_lahir')->get();
        return view('admin.kesehatan.pendataan', compact('data', 'penduduk'));
    }

    /**
     * Show create form
     */
    public function createPendataan()
    {
        $penduduk = Penduduk::select('id', 'nama', 'nik', 'tanggal_lahir')->get();
        return view('admin.kesehatan.pendataan-create', compact('penduduk'));
    }

    /**
     * Display pemantauan kesehatan page
     */
    public function pemantauan()
    {
        $data = PemantauanKesehatan::with('penduduk')->paginate(10);
        $penduduk = Penduduk::select('id', 'nama', 'nik', 'tanggal_lahir')->get();
        return view('admin.kesehatan.pemantauan', compact('data', 'penduduk'));
    }

    /**
     * Display vaksin page
     */
    public function vaksin()
    {
        $data = Vaksin::with('penduduk')->paginate(10);
        $penduduk = Penduduk::select('id', 'nama', 'nik')->get();
        return view('admin.kesehatan.vaksin', compact('data', 'penduduk'));
    }

    /**
     * Display stunting page
     */
    public function stunting()
    {
        $data = PemantauanKesehatan::with('penduduk')->whereNotNull('status_stunting')->paginate(10);
        $penduduk = Penduduk::select('id', 'nama', 'nik', 'tanggal_lahir')->get();
        return view('admin.kesehatan.stunting', compact('data', 'penduduk'));
    }

    // ============================================
    // PENDATAAN METHODS
    // ============================================

    /**
     * Store new health data
     */
    public function storePendataan(Request $request)
    {
        try {
            // Validasi data
            $validated = $request->validate([
                'penduduk_id' => 'required|exists:penduduk,id',
                'tanggal' => 'required|date',
                'jenis_pemeriksaan' => 'required|string',
                'berat_badan' => 'nullable|numeric|min:0',
                'tinggi_badan' => 'nullable|numeric|min:0',
                'tekanan_darah' => 'nullable|string',
                'status_gizi' => 'nullable|in:normal,kurang,lebih,obesitas',
                'keterangan' => 'nullable|string',
                'kelurahan' => 'nullable|string',
            ]);

            PendataanKesehatan::create($validated);

            if ($request->expectsJson()) {
                return response()->json(['success' => true, 'message' => 'Data kesehatan berhasil ditambahkan']);
            }

            return redirect()->route('admin.kesehatan.pendataan')
                ->with('success', 'Data kesehatan berhasil ditambahkan');
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $e->errors()
                ], 422);
            }
            throw $e;
        }
    }

    /**
     * Update health data
     */
    public function updatePendataan(Request $request, $id)
    {
        // Validasi data
        $validated = $request->validate([
            'penduduk_id' => 'required|exists:penduduk,id',
            'tanggal' => 'required|date',
            'jenis_pemeriksaan' => 'required|string',
            'berat_badan' => 'nullable|numeric|min:0',
            'tinggi_badan' => 'nullable|numeric|min:0',
            'tekanan_darah' => 'nullable|string',
            'status_gizi' => 'nullable|in:normal,kurang,lebih,obesitas',
            'keterangan' => 'nullable|string',
            'kelurahan' => 'nullable|string',
        ]);

        PendataanKesehatan::findOrFail($id)->update($validated);

        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Data kesehatan berhasil diperbarui']);
        }

        return redirect()->route('admin.kesehatan.pendataan')
            ->with('success', 'Data kesehatan berhasil diperbarui');
    }

    /**
     * Show edit form or return JSON for AJAX
     */
    public function editPendataan(Request $request, $id)
    {
        $data = PendataanKesehatan::findOrFail($id);
        $penduduk = Penduduk::select('id', 'nama', 'nik', 'tanggal_lahir')->get();

        if ($request->expectsJson()) {
            return response()->json($data->load('penduduk'));
        }

        return view('admin.kesehatan.pendataan-edit', compact('data', 'penduduk'));
    }

    /**
     * Delete health data
     */
    public function destroyPendataan($id)
    {
        PendataanKesehatan::findOrFail($id)->delete();

        return redirect()->route('admin.kesehatan.pendataan')
            ->with('success', 'Data kesehatan berhasil dihapus');
    }

    // ============================================
    // PEMANTAUAN METHODS
    // ============================================

    /**
     * Show create form for pemantauan
     */
    public function createPemantauan()
    {
        $penduduk = Penduduk::select('id', 'nama', 'nik', 'tanggal_lahir')->get();
        return view('admin.kesehatan.pemantauan-create', compact('penduduk'));
    }

    /**
     * Store new monitoring data
     */
    public function storePemantauan(Request $request)
    {
        $validated = $request->validate([
            'penduduk_id' => 'required|exists:penduduk,id',
            'tanggal' => 'required|date',
            'nama_pasien' => 'required|string',
            'jenis_pemantauan' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'frekuensi' => 'required|string',
            'petugas' => 'required|string',
            'status' => 'required|in:aktif,selesai,ditunda',
            'catatan' => 'nullable|string',
            'status_stunting' => 'nullable|in:normal,stunting,risiko_stunting',
        ]);

        PemantauanKesehatan::create($validated);

        return redirect()->route('admin.kesehatan.pemantauan')
            ->with('success', 'Data pemantauan berhasil ditambahkan');
    }

    /**
     * Show edit form for pemantauan
     */
    public function editPemantauan($id)
    {
        $data = PemantauanKesehatan::findOrFail($id);
        $penduduk = Penduduk::select('id', 'nama', 'nik', 'tanggal_lahir')->get();
        return view('admin.kesehatan.pemantauan-edit', compact('data', 'penduduk'));
    }

    /**
     * Update monitoring data
     */
    public function updatePemantauan(Request $request, $id)
    {
        $validated = $request->validate([
            'penduduk_id' => 'required|exists:penduduk,id',
            'tanggal' => 'required|date',
            'jenis_pemeriksaan' => 'required|string',
            'berat_badan' => 'nullable|numeric|min:0',
            'tinggi_badan' => 'nullable|numeric|min:0',
            'status_gizi' => 'nullable|in:normal,kurang,lebih,obesitas',
            'status_stunting' => 'nullable|in:normal,stunting,risiko_stunting',
            'keterangan' => 'nullable|string',
        ]);

        PemantauanKesehatan::findOrFail($id)->update($validated);

        return redirect()->route('admin.kesehatan.pemantauan')
            ->with('success', 'Data pemantauan berhasil diperbarui');
    }

    /**
     * Delete monitoring data
     */
    public function destroyPemantauan($id)
    {
        PemantauanKesehatan::findOrFail($id)->delete();

        return redirect()->route('admin.kesehatan.pemantauan')
            ->with('success', 'Data pemantauan berhasil dihapus');
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
            'penduduk_id' => 'required|exists:penduduk,id',
            'tanggal' => 'required|date',
            'berat_badan' => 'nullable|numeric|min:0',
            'tinggi_badan' => 'nullable|numeric|min:0',
            'lingkar_kepala' => 'nullable|numeric|min:0',
            'status_stunting' => 'nullable|in:normal,stunting,risiko_stunting',
            'keterangan' => 'nullable|string',
        ]);

        Stunting::create($validated);

        return redirect()->route('admin.kesehatan.stunting')
            ->with('success', 'Data stunting berhasil ditambahkan');
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