@extends('layouts.admin')

@section('title', 'Klasifikasi Surat')

@section('content')
<div class="space-y-6">

    <!-- Header -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Klasifikasi Surat</h1>
                <p class="text-sm text-slate-500 mt-1">Kelola klasifikasi dan kodefikasi surat desa</p>
            </div>
            <button class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-xl font-medium transition-colors duration-200 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Tambah Klasifikasi
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Total Klasifikasi</p>
                    <p class="text-2xl font-bold text-slate-900">47</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Aktif Digunakan</p>
                    <p class="text-2xl font-bold text-green-600">32</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Tidak Aktif</p>
                    <p class="text-2xl font-bold text-slate-600">15</p>
                </div>
                <div class="w-12 h-12 bg-slate-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter & Search -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
        <div class="flex flex-col sm:flex-row gap-4">
            <div class="flex-1">
                <input type="text" placeholder="Cari klasifikasi surat..."
                       class="w-full px-4 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
            </div>
            <div class="flex gap-2">
                <select class="px-4 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                    <option value="">Semua Kategori</option>
                    <option value="administrasi">Administrasi</option>
                    <option value="kependudukan">Kependudukan</option>
                    <option value="pembangunan">Pembangunan</option>
                    <option value="keuangan">Keuangan</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Kode</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Nama Klasifikasi</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Retensi Aktif</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Retensi Inaktif</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    <!-- Sample data - replace with actual data -->
                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-slate-900">001</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-slate-900">Surat Keterangan Domisili</div>
                            <div class="text-sm text-slate-500">Surat keterangan tempat tinggal penduduk</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">
                                Kependudukan
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-900">5 tahun</td>
                        <td class="px-6 py-4 text-sm text-slate-900">10 tahun</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <button class="text-emerald-600 hover:text-emerald-900 p-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                                <button class="text-blue-600 hover:text-blue-900 p-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button class="text-red-600 hover:text-red-900 p-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="bg-slate-50 px-6 py-4 border-t border-slate-200">
            <div class="flex items-center justify-between">
                <div class="text-sm text-slate-700">
                    Menampilkan 1 sampai 10 dari 47 hasil
                </div>
                <div class="flex items-center gap-2">
                    <button class="px-3 py-1 text-sm border border-slate-300 rounded hover:bg-slate-50 disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                        Sebelumnya
                    </button>
                    <button class="px-3 py-1 text-sm bg-emerald-600 text-white border border-emerald-600 rounded">1</button>
                    <button class="px-3 py-1 text-sm border border-slate-300 rounded hover:bg-slate-50">2</button>
                    <button class="px-3 py-1 text-sm border border-slate-300 rounded hover:bg-slate-50">3</button>
                    <button class="px-3 py-1 text-sm border border-slate-300 rounded hover:bg-slate-50">
                        Selanjutnya
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
