@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-800 mb-2">Laporan APBDes</h1>
                <p class="text-slate-600">Anggaran Pendapatan dan Belanja Desa</p>
            </div>
            <div class="flex gap-3">
                <button class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                    <i class="fas fa-print mr-2"></i>Print
                </button>
                <button class="px-4 py-2 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition">
                    <i class="fas fa-download mr-2"></i>Export PDF
                </button>
            </div>
        </div>
    </div>

    <!-- Period Selection -->
    <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Tahun Anggaran</label>
                <select class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                    <option>2024</option>
                    <option>2023</option>
                    <option>2022</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Periode</label>
                <select class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                    <option>Januari - Juni</option>
                    <option>Juli - Desember</option>
                    <option>Tahunan</option>
                </select>
            </div>
            <div class="flex items-end">
                <button class="px-6 py-2 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition">
                    <i class="fas fa-search mr-2"></i>Tampilkan
                </button>
            </div>
        </div>
    </div>

    <!-- APBDes Report -->
    <div class="bg-white rounded-lg shadow-sm border border-slate-200 overflow-hidden">
        <!-- Report Header -->
        <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
            <div class="text-center">
                <h2 class="text-xl font-bold text-slate-800">ANGGARAN PENDAPATAN DAN BELANJA DESA</h2>
                <p class="text-sm text-slate-600 mt-1">Tahun Anggaran 2024</p>
                <p class="text-sm text-slate-600">DESA LUMBUNG</p>
            </div>
        </div>

        <div class="p-6">
            <!-- Pendapatan Section -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-slate-800 mb-4 border-b-2 border-emerald-500 pb-2">A. PENDAPATAN</h3>
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-slate-300">
                        <thead>
                            <tr class="bg-slate-100">
                                <th class="border border-slate-300 px-4 py-2 text-left text-sm font-medium text-slate-700">Kode</th>
                                <th class="border border-slate-300 px-4 py-2 text-left text-sm font-medium text-slate-700">Uraian</th>
                                <th class="border border-slate-300 px-4 py-2 text-center text-sm font-medium text-slate-700">Anggaran</th>
                                <th class="border border-slate-300 px-4 py-2 text-center text-sm font-medium text-slate-700">Realisasi</th>
                                <th class="border border-slate-300 px-4 py-2 text-center text-sm font-medium text-slate-700">%</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-slate-300 px-4 py-2 text-sm">4.1.1</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm">Pendapatan Asli Desa</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">Rp 50.000.000</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">Rp 45.000.000</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">90%</td>
                            </tr>
                            <tr class="bg-slate-50">
                                <td class="border border-slate-300 px-4 py-2 text-sm">4.1.1.1</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm pl-8">Pajak Daerah</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">Rp 30.000.000</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">Rp 28.000.000</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">93%</td>
                            </tr>
                            <tr class="bg-slate-50">
                                <td class="border border-slate-300 px-4 py-2 text-sm">4.1.1.2</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm pl-8">Retribusi</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">Rp 15.000.000</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">Rp 12.000.000</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">80%</td>
                            </tr>
                            <tr>
                                <td class="border border-slate-300 px-4 py-2 text-sm">4.1.2</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm">Transfer</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">Rp 100.000.000</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">Rp 95.000.000</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">95%</td>
                            </tr>
                            <tr class="bg-emerald-50 font-semibold">
                                <td class="border border-slate-300 px-4 py-2 text-sm" colspan="2">JUMLAH PENDAPATAN</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">Rp 150.000.000</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">Rp 140.000.000</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">93%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Belanja Section -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-slate-800 mb-4 border-b-2 border-red-500 pb-2">B. BELANJA</h3>
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-slate-300">
                        <thead>
                            <tr class="bg-slate-100">
                                <th class="border border-slate-300 px-4 py-2 text-left text-sm font-medium text-slate-700">Kode</th>
                                <th class="border border-slate-300 px-4 py-2 text-left text-sm font-medium text-slate-700">Uraian</th>
                                <th class="border border-slate-300 px-4 py-2 text-center text-sm font-medium text-slate-700">Anggaran</th>
                                <th class="border border-slate-300 px-4 py-2 text-center text-sm font-medium text-slate-700">Realisasi</th>
                                <th class="border border-slate-300 px-4 py-2 text-center text-sm font-medium text-slate-700">%</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-slate-300 px-4 py-2 text-sm">5.1.1</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm">Belanja Pegawai</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">Rp 60.000.000</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">Rp 58.000.000</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">97%</td>
                            </tr>
                            <tr>
                                <td class="border border-slate-300 px-4 py-2 text-sm">5.1.2</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm">Belanja Barang dan Jasa</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">Rp 45.000.000</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">Rp 40.000.000</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">89%</td>
                            </tr>
                            <tr class="bg-slate-50">
                                <td class="border border-slate-300 px-4 py-2 text-sm">5.1.2.1</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm pl-8">ATK</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">Rp 5.000.000</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">Rp 4.500.000</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">90%</td>
                            </tr>
                            <tr class="bg-slate-50">
                                <td class="border border-slate-300 px-4 py-2 text-sm">5.1.2.2</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm pl-8">Transport</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">Rp 8.000.000</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">Rp 7.200.000</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">90%</td>
                            </tr>
                            <tr>
                                <td class="border border-slate-300 px-4 py-2 text-sm">5.1.3</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm">Belanja Modal</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">Rp 35.000.000</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">Rp 30.000.000</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">86%</td>
                            </tr>
                            <tr class="bg-red-50 font-semibold">
                                <td class="border border-slate-300 px-4 py-2 text-sm" colspan="2">JUMLAH BELANJA</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">Rp 140.000.000</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">Rp 128.000.000</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">91%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Summary -->
            <div class="bg-slate-50 rounded-lg p-6">
                <h4 class="text-lg font-semibold text-slate-800 mb-4">RINGKASAN</h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <p class="text-sm text-slate-600">Total Pendapatan</p>
                        <p class="text-2xl font-bold text-emerald-600">Rp 140.000.000</p>
                    </div>
                    <div class="text-center">
                        <p class="text-sm text-slate-600">Total Belanja</p>
                        <p class="text-2xl font-bold text-red-600">Rp 128.000.000</p>
                    </div>
                    <div class="text-center">
                        <p class="text-sm text-slate-600">Surplus/Defisit</p>
                        <p class="text-2xl font-bold text-blue-600">Rp 12.000.000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
