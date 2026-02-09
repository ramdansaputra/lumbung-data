<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SekretariatInformasiPublik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SekretariatController extends Controller {
    /**
     * LIST DATA
     */
    public function index(Request $request) {
        $informasiPublik = SekretariatInformasiPublik::query()
            ->when($request->search, function ($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->search . '%');
            })
            ->when($request->kategori, function ($q) use ($request) {
                $q->where('kategori', $request->kategori);
            })
            ->when($request->status, function ($q) use ($request) {
                $q->where('status', $request->status);
            })
            ->orderBy('tanggal_publikasi', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('admin.sekretariat.informasi-publik', compact('informasiPublik'));
    }

    /**
     * FORM CREATE
     */
    public function create() {
        return view('admin.sekretariat.informasi-publik-create');
    }

    /**
     * SIMPAN DATA
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'ringkasan' => 'nullable|string',
            'kategori' => 'required|in:berkala,serta_merta,setiap_saat,dikecualikan',
            'status' => 'required|in:aktif,arsip,nonaktif',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'tanggal_publikasi' => 'required|date',
        ]);

        // Upload file jika ada
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('informasi-publik', $fileName, 'public');
            $validated['file'] = $filePath;
        }

        SekretariatInformasiPublik::create($validated);

        return redirect()
            ->route('admin.sekretariat.informasi-publik.index')
            ->with('success', 'Informasi publik berhasil ditambahkan');
    }


    /**
     * FORM EDIT
     */
    public function edit($id) {
        $informasiPublik = SekretariatInformasiPublik::findOrFail($id);
        return view('admin.sekretariat.informasi-publik-edit', compact('informasiPublik'));
    }

    /**
     * UPDATE DATA
     */
    public function update(Request $request, $id) {
        $informasiPublik = SekretariatInformasiPublik::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'ringkasan' => 'nullable|string',
            'kategori' => 'required|in:berkala,serta_merta,setiap_saat,dikecualikan',
            'status' => 'required|in:aktif,arsip,nonaktif',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'tanggal_publikasi' => 'required|date',
        ]);

        // Jika upload file baru
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($informasiPublik->file && Storage::disk('public')->exists($informasiPublik->file)) {
                Storage::disk('public')->delete($informasiPublik->file);
            }

            // Upload file baru
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('informasi-publik', $fileName, 'public');
            $validated['file'] = $filePath;
        }

        $informasiPublik->update($validated);

        return redirect()
            ->route('admin.sekretariat.informasi-publik.index')
            ->with('success', 'Informasi publik berhasil diperbarui');
    }


    /**
     * HAPUS DATA
     */
    public function destroy($id) {
        $data = SekretariatInformasiPublik::findOrFail($id);

        // Hapus file jika ada
        if ($data->unggah_dokumen && Storage::disk('public')->exists($data->unggah_dokumen)) {
            Storage::disk('public')->delete($data->unggah_dokumen);
        }

        $data->delete();

        return redirect()
            ->route('admin.sekretariat.informasi-publik.index')
            ->with('success', 'Informasi publik berhasil dihapus');
    }

    /**
     * DOWNLOAD FILE
     */
    public function download($id) {
        $data = SekretariatInformasiPublik::findOrFail($id);

        if (!$data->unggah_dokumen || !Storage::disk('public')->exists($data->unggah_dokumen)) {
            return redirect()->back()->with('error', 'File tidak ditemukan');
        }

        return Storage::disk('public')->download($data->unggah_dokumen);
    }


    /**
     * HALAMAN LAIN
     */
    public function inventaris() {
        return view('admin.sekretariat.inventaris');
    }

    public function klasifikasiSurat() {
        return view('admin.sekretariat.klasifikasi-surat');
    }
}
