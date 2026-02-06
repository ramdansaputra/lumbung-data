@extends('layouts.admin')

@section('title', 'Rekapitulasi Kehadiran')

@section('content')
<div class="min-h-screen bg-slate-100 p-6">
    <div class="max-w-7xl mx-auto">

        <!-- HEADER -->
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-extrabold text-slate-800">Rekapitulasi Kehadiran</h1>
                <p class="text-sm text-slate-500">Laporan rekapitulasi kehadiran pegawai</p>
            </div>

            <div class="flex gap-3">
                <button class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold rounded-xl shadow-md transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Export Excel
                </button>
                <button class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-bold rounded-xl shadow-md transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                    Cetak PDF
                </button>
            </div>
        </div>

        <!-- FILTER -->
        <div class="bg-white rounded-2xl shadow-md border border-slate-200 p-6 mb-6">
            <h3 class="text-lg font-bold text-slate-800 mb-4">Filter Rekapitulasi</h3>

            <form class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-600 mb-1">Periode</label>
                    <select class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="bulan">Bulanan</option>
                        <option value="tahun">Tahunan</option>
                        <option value="custom">Custom</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-600 mb-1">Bulan</label>
                    <select class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-600 mb-1">Tahun</label>
                    <select class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                    </select>
                </div>

                <div class="flex items-end">
                    <button type="submit" class="w-full px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">Generate Laporan</button>
                </div>
            </form>
        </div>

        <!-- SUMMARY CARDS -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
            <div class="bg-white rounded-xl shadow-md border border-slate-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-slate-600">Total Pegawai</p>
                        <p class="text-2xl font-bold text-slate-800">25</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md border border-slate-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-slate-600">Hadir</p>
                        <p class="text-2xl font-bold text-green-600">22</p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md border border-slate-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-slate-600">Terlambat</p>
                        <p class="text-2xl font-bold text-yellow-600">2</p>
                    </div>
                    <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md border border-slate-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-slate-600">Tidak Hadir</p>
                        <p class="text-2xl font-bold text-red-600">1</p>
                    </div>
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- TABLE -->
        <div class="bg-white rounded-2xl shadow-md border border-slate-200 overflow-hidden">

            <div class="p-6">
                <h3 class="text-lg font-bold text-slate-800 mb-4">Detail Rekapitulasi - Januari 2024</h3>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-slate-200">
                                <th class="text-left py-3 px-4 font-semibold text-slate-600">Nama Pegawai</th>
                                <th class="text-center py-3 px-4 font-semibold text-slate-600">Hadir</th>
                                <th class="text-center py-3 px-4 font-semibold text-slate-600">Terlambat</th>
                                <th class="text-center py-3 px-4 font-semibold text-slate-600">Izin</th>
                                <th class="text-center py-3 px-4 font-semibold text-slate-600">Sakit</th>
                                <th class="text-center py-3 px-4 font-semibold text-slate-600">Alpha</th>
                                <th class="text-center py-3 px-4 font-semibold text-slate-600">Persentase</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample data - replace with dynamic data -->
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 px-4 font-medium">Ahmad Surya</td>
                                <td class="py-3 px-4 text-center">20</td>
                                <td class="py-3 px-4 text-center">1</td>
                                <td class="py-3 px-4 text-center">0</td>
                                <td class="py-3 px-4 text-center">0</td>
                                <td class="py-3 px-4 text-center">0</td>
                                <td class="py-3 px-4 text-center">
                                    <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">95%</span>
                                </td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 px-4 font-medium">Siti Aminah</td>
                                <td class="py-3 px-4 text-center">19</td>
                                <td class="py-3 px-4 text-center">0</td>
                                <td class="py-3 px-4 text-center">1</td>
                                <td class="py-3 px-4 text-center">1</td>
                                <td class="py-3 px-4 text-center">0</td>
                                <td class="py-3 px-4 text-center">
                                    <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">90%</span>
                                </td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 px-4 font-medium">Budi Santoso</td>
                                <td class="py-3 px-4 text-center">18</td>
                                <td class="py-3 px-4 text-center">2</td>
                                <td class="py-3 px-4 text-center">0</td>
                                <td class="py-3 px-4 text-center">0</td>
                                <td class="py-3 px-4 text-center">1</td>
                                <td class="py-3 px-4 text-center">
                                    <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-medium">85%</span>
                                </td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
