@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-800 mb-2">Dashboard Keuangan</h1>
                <p class="text-slate-600">Ringkasan keuangan dan aktivitas terkini desa</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('admin.keuangan.input-data') }}" class="px-4 py-2 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition">
                    <i class="fas fa-plus mr-2"></i>Input Data
                </a>
                <a href="{{ route('admin.keuangan.laporan') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                    <i class="fas fa-chart-bar mr-2"></i>Lihat Laporan
                </a>
            </div>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
            <div class="flex items-center">
                <div class="p-2 bg-emerald-100 rounded-lg">
                    <i class="fas fa-arrow-up text-emerald-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-slate-600">Total Pemasukan</p>
                    <p class="text-2xl font-bold text-emerald-600">Rp 140.000.000</p>
                    <p class="text-xs text-slate-500 mt-1">+12% dari bulan lalu</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
            <div class="flex items-center">
                <div class="p-2 bg-red-100 rounded-lg">
                    <i class="fas fa-arrow-down text-red-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-slate-600">Total Pengeluaran</p>
                    <p class="text-2xl font-bold text-red-600">Rp 128.000.000</p>
                    <p class="text-xs text-slate-500 mt-1">+8% dari bulan lalu</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
            <div class="flex items-center">
                <div class="p-2 bg-blue-100 rounded-lg">
                    <i class="fas fa-wallet text-blue-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-slate-600">Saldo Saat Ini</p>
                    <p class="text-2xl font-bold text-blue-600">Rp 12.000.000</p>
                    <p class="text-xs text-slate-500 mt-1">Surplus bulan ini</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
            <div class="flex items-center">
                <div class="p-2 bg-amber-100 rounded-lg">
                    <i class="fas fa-chart-line text-amber-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-slate-600">Anggaran 2024</p>
                    <p class="text-2xl font-bold text-amber-600">91%</p>
                    <p class="text-xs text-slate-500 mt-1">Terealisasi</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="{{ route('admin.keuangan.input-data') }}" class="bg-white rounded-lg shadow-sm border border-slate-200 p-6 hover:shadow-md transition group">
            <div class="flex items-center">
                <div class="p-3 bg-emerald-100 rounded-lg group-hover:bg-emerald-200 transition">
                    <i class="fas fa-plus text-emerald-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-slate-800">Input Data Keuangan</h3>
                    <p class="text-sm text-slate-600">Tambah pemasukan atau pengeluaran baru</p>
                </div>
            </div>
        </a>

        <a href="{{ route('admin.keuangan.laporan') }}" class="bg-white rounded-lg shadow-sm border border-slate-200 p-6 hover:shadow-md transition group">
            <div class="flex items-center">
                <div class="p-3 bg-blue-100 rounded-lg group-hover:bg-blue-200 transition">
                    <i class="fas fa-chart-bar text-blue-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-slate-800">Laporan Keuangan</h3>
                    <p class="text-sm text-slate-600">Lihat detail laporan pemasukan dan pengeluaran</p>
                </div>
            </div>
        </a>

        <a href="{{ route('admin.keuangan.laporan-apbdes') }}" class="bg-white rounded-lg shadow-sm border border-slate-200 p-6 hover:shadow-md transition group">
            <div class="flex items-center">
                <div class="p-3 bg-purple-100 rounded-lg group-hover:bg-purple-200 transition">
                    <i class="fas fa-file-alt text-purple-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-slate-800">Laporan APBDes</h3>
                    <p class="text-sm text-slate-600">Anggaran Pendapatan dan Belanja Desa</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Recent Transactions -->
    <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-slate-800">Transaksi Terbaru</h3>
            <a href="{{ route('admin.keuangan.laporan') }}" class="text-sm text-emerald-600 hover:text-emerald-700">Lihat Semua</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Jenis</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Keterangan</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Jumlah</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-slate-200">
                    <tr>
                        <td class="px-4 py-2 whitespace-nowrap text-sm text-slate-900">2024-01-15</td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Pemasukan</span>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap text-sm text-slate-900">Pajak Bumi dan Bangunan</td>
                        <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-600 font-medium">Rp 5.000.000</td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Terverifikasi</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 whitespace-nowrap text-sm text-slate-900">2024-01-10</td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Pengeluaran</span>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap text-sm text-slate-900">Pembelian ATK</td>
                        <td class="px-4 py-2 whitespace-nowrap text-sm text-red-600 font-medium">Rp 500.000</td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Terverifikasi</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 whitespace-nowrap text-sm text-slate-900">2024-01-08</td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Pemasukan</span>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap text-sm text-slate-900">Bantuan Sosial</td>
                        <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-600 font-medium">Rp 2.500.000</td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
