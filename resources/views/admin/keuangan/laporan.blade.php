@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-800 mb-2">Laporan Keuangan</h1>
                <p class="text-slate-600">Kelola dan pantau laporan keuangan desa</p>
            </div>
            <div class="flex gap-3">
                <button class="px-4 py-2 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition">
                    <i class="fas fa-plus mr-2"></i>Tambah Laporan
                </button>
                <button class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                    <i class="fas fa-download mr-2"></i>Export
                </button>
            </div>
        </div>
    </div>

    <!-- Filter & Search -->
    <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Tahun</label>
                <select class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                    <option>2024</option>
                    <option>2023</option>
                    <option>2022</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Bulan</label>
                <select class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                    <option>Semua</option>
                    <option>Januari</option>
                    <option>Februari</option>
                    <option>Maret</option>
                    <option>April</option>
                    <option>Mei</option>
                    <option>Juni</option>
                    <option>Juli</option>
                    <option>Agustus</option>
                    <option>September</option>
                    <option>Oktober</option>
                    <option>November</option>
                    <option>Desember</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Jenis Laporan</label>
                <select class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                    <option>Semua</option>
                    <option>Pemasukan</option>
                    <option>Pengeluaran</option>
                    <option>Saldo</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Cari</label>
                <input type="text" placeholder="Cari laporan..." class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-lg shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Jenis</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Keterangan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Pemasukan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Pengeluaran</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Saldo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-slate-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900">2024-01-15</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Pemasukan</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900">Pajak Bumi dan Bangunan</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-emerald-600 font-medium">Rp 5.000.000</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">-</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900 font-medium">Rp 15.000.000</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button class="text-blue-600 hover:text-blue-900 mr-3">Edit</button>
                            <button class="text-red-600 hover:text-red-900">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900">2024-01-10</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Pengeluaran</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900">Pembelian ATK</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">-</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-red-600 font-medium">Rp 500.000</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900 font-medium">Rp 10.000.000</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button class="text-blue-600 hover:text-blue-900 mr-3">Edit</button>
                            <button class="text-red-600 hover:text-red-900">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
            <div class="flex items-center">
                <div class="p-2 bg-emerald-100 rounded-lg">
                    <i class="fas fa-arrow-up text-emerald-600"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-slate-600">Total Pemasukan</p>
                    <p class="text-2xl font-bold text-emerald-600">Rp 25.000.000</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
            <div class="flex items-center">
                <div class="p-2 bg-red-100 rounded-lg">
                    <i class="fas fa-arrow-down text-red-600"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-slate-600">Total Pengeluaran</p>
                    <p class="text-2xl font-bold text-red-600">Rp 15.000.000</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
            <div class="flex items-center">
                <div class="p-2 bg-blue-100 rounded-lg">
                    <i class="fas fa-wallet text-blue-600"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-slate-600">Saldo Saat Ini</p>
                    <p class="text-2xl font-bold text-blue-600">Rp 10.000.000</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
            <div class="flex items-center">
                <div class="p-2 bg-amber-100 rounded-lg">
                    <i class="fas fa-chart-line text-amber-600"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-slate-600">Rata-rata Bulanan</p>
                    <p class="text-2xl font-bold text-amber-600">Rp 833.333</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
