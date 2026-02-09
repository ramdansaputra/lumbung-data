@extends('layouts.admin')

@section('title', 'Informasi Publik')

@section('content')
<div class="space-y-6">

    <!-- Header -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Pengaturan Informasi Publik Di Desa</h1>
                <p class="text-sm text-slate-500 mt-1">Kelola informasi publik desa yang dapat diakses masyarakat</p>
            </div>
            <a href="{{ route('admin.sekretariat.informasi-publik.create') }}"
                class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-xl font-medium transition-colors duration-200 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Tambah Dokumen
            </a>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-xl flex items-center gap-3">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl flex items-center gap-3">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
        {{ session('error') }}
    </div>
    @endif

    <!-- Filter & Search -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
        <form method="GET" class="flex flex-col sm:flex-row gap-4">
            <div class="flex-1">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul dokumen..."
                    class="w-full px-4 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
            </div>

            <div class="flex gap-2">
                <select name="kategori"
                    class="px-4 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                    <option value="">Semua Kategori</option>
                    <option value="Informasi Berkala" @selected(request('kategori')=='Informasi Berkala' )>Informasi
                        Berkala</option>
                    <option value="Informasi Serta Merta" @selected(request('kategori')=='Informasi Serta Merta' )>
                        Informasi Serta Merta</option>
                    <option value="Informasi Setiap Saat" @selected(request('kategori')=='Informasi Setiap Saat' )>
                        Informasi Setiap Saat</option>
                    <option value="Informasi Dikecualikan" @selected(request('kategori')=='Informasi Dikecualikan' )>
                        Informasi Dikecualikan</option>
                </select>

                <select name="status"
                    class="px-4 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                    <option value="">Semua Status</option>
                    <option value="ya" @selected(request('status')=='ya' )>Terbit</option>
                    <option value="tidak" @selected(request('status')=='tidak' )>Tidak Terbit</option>
                </select>

                <button type="submit"
                    class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl font-medium transition-colors">
                    Cari
                </button>
            </div>
        </form>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">
                            Judul Dokumen</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">
                            Tipe</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">
                            Kategori</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">
                            Tahun</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">
                            Tanggal Terbit</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">
                            Status</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">
                            Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-200">
                    @forelse ($informasiPublik as $item)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-slate-900">{{ $item->judul_dokumen }}</div>
                            @if($item->keterangan)
                            <div class="text-sm text-slate-500 line-clamp-2 mt-1">{{ Str::limit($item->keterangan, 100)
                                }}</div>
                            @endif
                        </td>

                        <td class="px-6 py-4">
                            <span class="inline-flex px-2 py-1 text-xs font-medium 
                                {{ $item->tipe_dokumen === 'file' ? 'bg-blue-100 text-blue-800' : 
                                   ($item->tipe_dokumen === 'link' ? 'bg-purple-100 text-purple-800' : 'bg-gray-100 text-gray-800') }}
                                rounded-full">
                                {{ ucfirst($item->tipe_dokumen) }}
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <span
                                class="inline-flex px-2 py-1 text-xs font-medium bg-indigo-100 text-indigo-800 rounded-full">
                                {{ $item->kategori_info_publik ?: '-' }}
                            </span>
                        </td>

                        <td class="px-6 py-4 text-sm text-slate-900">
                            {{ $item->tahun ?: '-' }}
                        </td>

                        <td class="px-6 py-4 text-sm text-slate-900">
                            {{ \Carbon\Carbon::parse($item->tanggal_terbit)->format('d-m-Y') }}
                        </td>

                        <td class="px-6 py-4">
                            <span class="inline-flex px-2 py-1 text-xs font-medium
                                {{ $item->status_terbit === 'ya' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}
                                rounded-full">
                                {{ $item->status_terbit === 'ya' ? 'Terbit' : 'Tidak Terbit' }}
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">

                                <!-- Download -->
                                @if($item->unggah_dokumen && $item->tipe_dokumen === 'file')
                                <a href="{{ route('admin.sekretariat.informasi-publik.download', $item->id) }}"
                                    class="text-emerald-600 hover:text-emerald-900 p-1 transition-colors"
                                    title="Download">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </a>
                                @endif

                                <!-- Edit -->
                                <a href="{{ route('admin.sekretariat.informasi-publik.edit', $item->id) }}"
                                    class="text-blue-600 hover:text-blue-900 p-1 transition-colors" title="Edit">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5
                                                 m-1.414-9.414a2 2 0 112.828 2.828
                                                 L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>

                                <!-- Delete -->
                                <form method="POST"
                                    action="{{ route('admin.sekretariat.informasi-publik.destroy', $item->id) }}"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 p-1 transition-colors"
                                        title="Hapus">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862
                                                     a2 2 0 01-1.995-1.858L5 7
                                                     m5 4v6m4-6v6m1-10V4
                                                     a1 1 0 00-1-1h-4
                                                     a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center">
                            <svg class="w-16 h-16 mx-auto text-slate-300 mb-3" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <p class="text-slate-500 font-medium">Belum ada data informasi publik</p>
                            <p class="text-sm text-slate-400 mt-1">Klik tombol "Tambah Dokumen" untuk menambahkan data
                                baru</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($informasiPublik->hasPages())
        <div class="bg-slate-50 px-6 py-4 border-t border-slate-200">
            {{ $informasiPublik->links() }}
        </div>
        @endif
    </div>

</div>
@endsection