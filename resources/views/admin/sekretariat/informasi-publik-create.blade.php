@extends('layouts.admin')

@section('title', 'Tambah Informasi Publik')

@section('content')
<div class="space-y-6">

    <!-- Header -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Tambah Informasi Publik</h1>
                <p class="text-sm text-slate-500 mt-1">Tambahkan dokumen informasi publik baru untuk masyarakat</p>
            </div>
            <a href="{{ route('admin.sekretariat.informasi-publik.index') }}"
                class="text-slate-600 hover:text-slate-800 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </a>
        </div>
    </div>

    <!-- Button Info -->
    <div class="bg-cyan-50 border border-cyan-200 px-4 py-3 rounded-xl flex items-center gap-3">
        <svg class="w-5 h-5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <a href="{{ route('admin.sekretariat.informasi-publik.index') }}"
            class="text-cyan-800 font-medium hover:underline">
            Kembali Ke Daftar Informasi Publik Di Desa
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
        <form method="POST" action="{{ route('admin.sekretariat.informasi-publik.store') }}"
            enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Judul -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Judul
                </label>
                <input type="text" name="judul" value="{{ old('judul') }}"
                    class="w-full px-4 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors @error('judul') border-red-500 @enderror"
                    placeholder="Masukkan judul dokumen">
                @error('judul')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tipe Dokumen -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Tipe Dokumen
                </label>
                <select name="tipe_dokumen" id="tipe_dokumen"
                    class="w-full px-4 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors @error('tipe_dokumen') border-red-500 @enderror">
                    <option value="file" @selected(old('tipe_dokumen')=='file' )>File</option>
                    <option value="link" @selected(old('tipe_dokumen')=='link' )>Link</option>
                    <option value="teks" @selected(old('tipe_dokumen')=='teks' )>Teks</option>
                </select>
                @error('tipe_dokumen')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Unggah Dokumen -->
            <div id="unggah_container">
                <label class="block text-sm font-medium text-slate-700 mb-2">Unggah Dokumen</label>
                <div
                    class="border-2 border-dashed border-slate-300 rounded-xl p-6 text-center hover:border-emerald-500 transition-colors @error('unggah_dokumen') border-red-500 @enderror">
                    <input type="file" name="unggah_dokumen" id="file-upload" class="hidden" accept=".pdf,.doc,.docx">
                    <label for="file-upload" class="cursor-pointer">
                        <svg class="w-12 h-12 mx-auto text-slate-400 mb-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                        <span class="text-sm text-slate-600">📄 Browse</span>
                        <p class="text-xs text-slate-500 mt-1">PDF, DOC, DOCX (Maksimal 2MB)</p>
                    </label>
                    <div id="file-name" class="mt-2 text-sm text-emerald-600 hidden"></div>
                </div>
                @error('unggah_dokumen')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Retensi Dokumen -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Retensi Dokumen
                </label>
                <div class="flex gap-3">
                    <input type="number" name="retensi_dokumen" value="{{ old('retensi_dokumen', 0) }}" min="0" max="31"
                        class="w-32 px-4 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors @error('retensi_dokumen') border-red-500 @enderror">

                    <select name="satuan_retensi"
                        class="px-4 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors @error('satuan_retensi') border-red-500 @enderror">
                        <option value="hari" @selected(old('satuan_retensi')=='hari' )>Hari</option>
                        <option value="bulan" @selected(old('satuan_retensi')=='bulan' )>Bulan</option>
                        <option value="tahun" @selected(old('satuan_retensi')=='tahun' )>Tahun</option>
                    </select>
                </div>
                <p class="text-xs text-slate-500 mt-1">Nilai harus antara 0 hingga 31. Isi 0 jika tidak digunakan.</p>
                @error('retensi_dokumen')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
                @error('satuan_retensi')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Kategori Informasi Publik -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Kategori Informasi Publik
                </label>
                <select name="kategori_info_publik"
                    class="w-full px-4 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors @error('kategori_info_publik') border-red-500 @enderror">
                    <option value="">Pilih Kategori Informasi Publik</option>
                    <option value="Informasi Berkala" @selected(old('kategori_info_publik')=='Informasi Berkala' )>
                        Informasi Berkala</option>
                    <option value="Informasi Serta Merta" @selected(old('kategori_info_publik')=='Informasi Serta Merta'
                        )>Informasi Serta Merta</option>
                    <option value="Informasi Setiap Saat" @selected(old('kategori_info_publik')=='Informasi Setiap Saat'
                        )>Informasi Setiap Saat</option>
                    <option value="Informasi Dikecualikan"
                        @selected(old('kategori_info_publik')=='Informasi Dikecualikan' )>Informasi Dikecualikan
                    </option>
                </select>
                @error('kategori_info_publik')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Keterangan -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Keterangan</label>
                <textarea name="keterangan" rows="4"
                    class="w-full px-4 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors @error('keterangan') border-red-500 @enderror"
                    placeholder="Masukkan keterangan">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tahun -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Tahun
                </label>
                <input type="text" name="tahun" value="{{ old('tahun', date('Y')) }}" placeholder="Contoh: 2019"
                    class="w-full px-4 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors @error('tahun') border-red-500 @enderror">
                @error('tahun')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tanggal Terbit -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Tanggal Terbit
                </label>
                <input type="date" name="tanggal_terbit" value="{{ old('tanggal_terbit', date('Y-m-d')) }}"
                    class="w-full px-4 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors @error('tanggal_terbit') border-red-500 @enderror">
                @error('tanggal_terbit')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status Terbit -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Status Terbit
                </label>
                <div class="flex gap-4">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="status_terbit" value="ya" @checked(old('status_terbit', 'ya' )=='ya' )
                            class="w-4 h-4 text-emerald-600 focus:ring-emerald-500">
                        <span class="text-sm text-slate-700">Ya</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="status_terbit" value="tidak" @checked(old('status_terbit')=='tidak' )
                            class="w-4 h-4 text-emerald-600 focus:ring-emerald-500">
                        <span class="text-sm text-slate-700">Tidak</span>
                    </label>
                </div>
                @error('status_terbit')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-200">
                <a href="{{ route('admin.sekretariat.informasi-publik.index') }}"
                    class="px-6 py-2.5 border border-slate-300 text-slate-700 rounded-xl hover:bg-slate-50 font-medium transition-colors">
                    Batal
                </a>
                <button type="submit"
                    class="px-6 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl font-medium transition-colors flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan
                </button>
            </div>

        </form>
    </div>

</div>

<script>
    document.getElementById('file-upload').addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name;
        const fileNameDiv = document.getElementById('file-name');
        if (fileName) {
            fileNameDiv.textContent = '📄 ' + fileName;
            fileNameDiv.classList.remove('hidden');
        }
    });

    // Toggle unggah dokumen based on tipe dokumen
    document.getElementById('tipe_dokumen').addEventListener('change', function() {
        const unggahContainer = document.getElementById('unggah_container');
        if (this.value === 'file') {
            unggahContainer.style.display = 'block';
        } else {
            unggahContainer.style.display = 'none';
        }
    });
</script>
@endsection