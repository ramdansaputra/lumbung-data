@extends('layouts.admin')

@section('title', 'Hari Libur')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Hari Libur</h1>
    <p class="text-gray-600 mt-1">Kelola hari libur dan cuti bersama</p>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600">Total Hari Libur</p>
                <p class="text-2xl font-bold text-gray-800 mt-1">28</p>
                <p class="text-xs text-gray-500">Tahun 2026</p>
            </div>
            <div class="bg-blue-100 rounded-full p-3">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600">Libur Nasional</p>
                <p class="text-2xl font-bold text-gray-800 mt-1">16</p>
                <p class="text-xs text-gray-500">Hari</p>
            </div>
            <div class="bg-green-100 rounded-full p-3">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600">Cuti Bersama</p>
                <p class="text-2xl font-bold text-gray-800 mt-1">7</p>
                <p class="text-xs text-gray-500">Hari</p>
            </div>
            <div class="bg-purple-100 rounded-full p-3">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600">Libur Khusus</p>
                <p class="text-2xl font-bold text-gray-800 mt-1">5</p>
                <p class="text-xs text-gray-500">Hari</p>
            </div>
            <div class="bg-yellow-100 rounded-full p-3">
                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Filter & Search -->
<div class="bg-white rounded-lg shadow-sm p-4 mb-6">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Pencarian</label>
            <input type="text" placeholder="Cari nama hari libur..." 
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Libur</label>
            <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="">Semua Jenis</option>
                <option value="nasional">Libur Nasional</option>
                <option value="cuti_bersama">Cuti Bersama</option>
                <option value="khusus">Libur Khusus</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Tahun</label>
            <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="2026">2026</option>
                <option value="2025">2025</option>
                <option value="2024">2024</option>
            </select>
        </div>
        <div class="flex items-end">
            <button class="w-full bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-200">
                Cari
            </button>
        </div>
    </div>
</div>

<!-- Action Buttons -->
<div class="flex justify-between items-center mb-4">
    <div>
        <button class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition duration-200 flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Hari Libur
        </button>
    </div>
    <div class="flex gap-2">
        <button class="bg-gray-100 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-200 transition duration-200 flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            Export
        </button>
        <button class="bg-gray-100 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-200 transition duration-200 flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
            </svg>
            Cetak Kalender
        </button>
    </div>
</div>

<!-- Data Table -->
<div class="bg-white rounded-lg shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Hari Libur</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Keterangan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">01 Januari 2026</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Tahun Baru Masehi</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Libur Nasional
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">Hari raya nasional</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex gap-2">
                            <button class="text-blue-600 hover:text-blue-900">Detail</button>
                            <button class="text-yellow-600 hover:text-yellow-900">Edit</button>
                            <button class="text-red-600 hover:text-red-900">Hapus</button>
                        </div>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">29 Maret 2026</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Idul Fitri 1447 H</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Libur Nasional
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">Hari raya Idul Fitri</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex gap-2">
                            <button class="text-blue-600 hover:text-blue-900">Detail</button>
                            <button class="text-yellow-600 hover:text-yellow-900">Edit</button>
                            <button class="text-red-600 hover:text-red-900">Hapus</button>
                        </div>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">3</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">27-28 Maret 2026</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Cuti Bersama Idul Fitri</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                            Cuti Bersama
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">Cuti bersama menjelang Lebaran</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex gap-2">
                            <button class="text-blue-600 hover:text-blue-900">Detail</button>
                            <button class="text-yellow-600 hover:text-yellow-900">Edit</button>
                            <button class="text-red-600 hover:text-red-900">Hapus</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
        <div class="flex-1 flex justify-between sm:hidden">
            <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                Previous
            </button>
            <button class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                Next
            </button>
        </div>
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700">
                    Menampilkan <span class="font-medium">1</span> sampai <span class="font-medium">10</span> dari <span class="font-medium">28</span> hasil
                </p>
            </div>
            <div>
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px">
                    <button class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">1</button>
                    <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">2</button>
                    <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">3</button>
                    <button class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection