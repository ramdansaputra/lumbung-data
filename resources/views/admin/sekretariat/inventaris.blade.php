@extends('layouts.admin')

@section('title', 'Inventaris')

@section('content')
<div class="space-y-6">

    <!-- Header -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Inventaris</h1>
                <p class="text-sm text-slate-500 mt-1">Kelola inventaris dan aset desa</p>
            </div>
            <button class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-xl font-medium transition-colors duration-200 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Tambah Barang
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Total Barang</p>
                    <p class="text-2xl font-bold text-slate-900">245</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Barang Baik</p>
                    <p class="text-2xl font-bold text-green-600">189</p>
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
                    <p class="text-sm font-medium text-slate-600">Perlu Perbaikan</p>
                    <p class="text-2xl font-bold text-yellow-600">34</p>
                </div>
                <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Barang Rusak</p>
                    <p class="text-2xl font-bold text-red-600">22</p>
                </div>
                <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter & Search -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
        <div class="flex flex-col sm:flex-row gap-4">
            <div class="flex-1">
                <input type="text" placeholder="Cari inventaris..."
                       class="w-full px-4 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
            </div>
            <div class="flex gap-2">
                <select class="px-4 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                    <option value="">Semua Kategori</option>
                    <option value="elektronik">Elektronik</option>
                    <option value="furniture">Furniture</option>
                    <option value="kendaraan">Kendaraan</option>
                    <option value="peralatan">Peralatan</option>
                </select>
                <select class="px-4 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                    <option value="">Semua Kondisi</option>
                    <option value="baik">Baik</option>
                    <option value="rusak">Rusak</option>
                    <option value="perlu_perbaikan">Perlu Perbaikan</option>
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
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Nama Barang</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Jumlah</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Kondisi</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Lokasi</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    <!-- Sample data - replace with actual data -->
                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-slate-900">Komputer Desktop</div>
                            <div class="text-sm text-slate-500">PC untuk administrasi kantor</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">
                                Elektronik
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-900">5</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">
                                Baik
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-900">Kantor Desa</td>
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
                    Menampilkan 1 sampai 10 dari 245 hasil
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
