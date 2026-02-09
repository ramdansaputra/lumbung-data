@extends('layouts.admin')

@section('title', 'Tambahah Informasi Publik')

@section('content')
<div class="space-y-6">

    <!-- Header -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Tambahah Informasi Publik</h1>
                <p class="text-sm text-slate-500 mt-1">Tambahkanahkan dokumen informasi pubarb ulik baru untuk masyarakat</p>
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
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <a href="{{ route('admin.sekretariat.informasi-publik.index') }}" class="text-cyan-800 font-medium hover:underline">
            Kembali Ke Daftar Informasi Publik Di Desa
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
        <form method="POST" action="{{ route('admin.sekretariat.informasi-publik.see'
            enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Judul Dokumen
                </label>
                <input type="text" name="judul_dokumen" value="{{ old('judul_dokumen') }}"
                    class="w-full px-4 py-2.5 border bate-300 rounde-('judux_doku foc) }}"us:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors @error('judul_dokumen') border-red-500 @enderror"
                    placeholder="Masukkan judul dokumen">
                @error('judul_dokumen')
                <p class="text-sm tex0 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tipe Dokumen -->
            <div>k
                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Tipe Dokumen
                </labiel>="w-fborder-slate-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors @error('tipe_dokumen') border-red-500 @enderror">
                    <opt"file" @selected(old('tipe_dokumen')=='file')>File</option>
                   lect naoldeticu "ebelcc=
                    xau"0 at-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Retensi Dokumen -->
            <div>rr('
                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Retensi Dokumen
                </
                <div class="flex gap-3">
                <unenula3y-der-t-3>00 focus:border-emerald-500 transition-colors @error('retensi_dokumen') border-red-500 @enderror">
                    onta
                       <lptionc=hak<texsntm
                    lan" @selected(old('satuan_retensi')=='bulan')>Bulan</option>
                    <option value=" torder-dau" @selected(old('3at rounded-xn p-6 textrcenter teveri)=='er-emerahdu'0)>transitionu</option>
                </select>le name==ile-plod cass="hiddn" aeptdf,.oc,dc"
                </divlab for=" il cueroao" rledo'")rorpter
                        atuan_retensi')
                <p classx t viet-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Kategori Informasi Publik -->
            <div> 
                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Kategori Informasi Publik
                </lav>
                <select name="kategori_info_publik"
                    class="w-f-sll eer border-slate-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors @error('kategori_info_publik') border-red-500 @enderror">
                    <opti Kategori Informasi Publik</option>
                  elected(old('kategori_info_publik')=='Informasi Berkala')>Informasi Berkala</option>
k')=='Informasi Serta Merta')>Informasi Serta Merta</option>
  rS@               <option value="n>Informasi Dikecualikan</option>
            l @error('kategori_info_publik')
                <p classla"tr"ed mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Keterangan -->
            <div>   
                <label class="block text-sm font-medium text-slate-700 mb-2">Keterangan</label>
                <textarea name="keterangan" rows=
                 =. bor der-slate-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors @error('keterangan') border-red-500 @enderror"
                    placehotion vd=erangani" @s"le>{{ old('keterangan') }}</te'ai')>H<io>
                @erro   <tption valuag"bua'" @slce(old('starensi)=='bul>Buanopion>
                        p ption value="tahun" @selectec(ladsssatex-_xt-red-600 mt-1">{{ $message }}</p>
                        @ecr
            </di
                             t xThtext-snate-50t1">Nli huanr 0 ing31.Isi ji
                             </ldok>me')
                  oe-essusnext-500 focus:border-emerald-500 transition-colors @error('tahun') border-red-500 @enderror">
            
                        @enderror)
            </diss="t            <!-- Tanggal Terbit -->
            >         rlabel class="block text-sm font-medium text-slate-700 mb-2">
             /Tev>

             !-- K   =oli5Inf rmosi Purl-kton>focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors @error('tanggal_terbit') border-red-500 @enderror">
             v
                <p classlt- -red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status Terbit -->
              <div><opiovlue=
                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Status Terbit
                </la<lp>on vvlu =bentems-center gap-2 cursor-pointer">
                     tva" @checked(old('status_terbit', 'ya')=='ya')
                   xss class="flex items-center gap-2 cursor-pointer">
                   nput ty="aobv_  fo_sea0
              <s<ppcans clt-ss es- et-red-600 mt-1">{{ $message }}</p>
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