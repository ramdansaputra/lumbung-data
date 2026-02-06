@extends('layouts.admin')

@section('title', 'Informasi Publik')

@section('content')
<div class="space-y-6">

    <!-- Header -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Informasi Publik</h1>
                <p class="text-sm text-slate-500 mt-1">Kelola informasi publik desa yang dapat diakses masyarakat</p>
            </div>
            <button class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-xl font-medium transition-colors duration-200 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Tambah Informasi
            </button>
        </div>
    </div>

    <!-- Filter & Search -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
        <div class="flex flex-col sm:flex-row gap-4">
            <div class="flex-1">
                <input type="text" placeholder="Cari informasi publik..."
                       class="w-full px-4 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
            </div>
            <div class="flex gap-2">
                <select class="px-4 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                    <option value="">Semua Kategori</option>
                    <option value="berita">Berita</option>
                    <option value="pengumuman">Pengumuman</option>
                    <option value="agenda">Agenda</option>
                    <option value="program">Program</option>
                </select>
                <select class="px-4 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                    <option value="">Semua Status</option>
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
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
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Judul</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    <!-- Sample data - replace with actual data -->
                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-slate-900">Pengumuman Kegiatan Posyandu</div>
                            <div class="text-sm text-slate-500">Kegiatan kesehatan rutin untuk masyarakat</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">
                                Pengumuman
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">
                                Published
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-900">2024-01-15</td>
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
                    Menampilkan 1 sampai 10 dari 50 hasil
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
