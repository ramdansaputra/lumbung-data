@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-800 mb-2">Input Data Keuangan</h1>
                <p class="text-slate-600">Masukkan data pemasukan dan pengeluaran keuangan desa</p>
            </div>
            <button class="px-4 py-2 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition">
                <i class="fas fa-save mr-2"></i>Simpan Data
            </button>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
        <form class="space-y-6">
            <!-- Basic Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Tanggal *</label>
                    <input type="date" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Jenis Transaksi *</label>
                    <select class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" required>
                        <option value="">Pilih jenis transaksi</option>
                        <option value="pemasukan">Pemasukan</option>
                        <option value="pengeluaran">Pengeluaran</option>
                    </select>
                </div>
            </div>

            <!-- Transaction Details -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Kategori</label>
                    <select class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="">Pilih kategori</option>
                        <option value="pajak">Pajak</option>
                        <option value="bantuan">Bantuan</option>
                        <option value="retribusi">Retribusi</option>
                        <option value="atk">ATK</option>
                        <option value="listrik">Listrik</option>
                        <option value="transport">Transport</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Nomor Bukti</label>
                    <input type="text" placeholder="Masukkan nomor bukti" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                </div>
            </div>

            <!-- Amount -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Jumlah (Rp) *</label>
                <input type="number" placeholder="0" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" required>
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Keterangan *</label>
                <textarea rows="4" placeholder="Jelaskan detail transaksi..." class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" required></textarea>
            </div>

            <!-- File Upload -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Lampiran</label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-300 border-dashed rounded-lg hover:border-emerald-400 transition">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-slate-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-slate-600">
                            <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-emerald-600 hover:text-emerald-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-emerald-500">
                                <span>Upload file</span>
                                <input id="file-upload" name="file-upload" type="file" class="sr-only">
                            </label>
                            <p class="pl-1">atau drag and drop</p>
                        </div>
                        <p class="text-xs text-slate-500">PNG, JPG, PDF hingga 10MB</p>
                    </div>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex justify-end gap-3 pt-6 border-t border-slate-200">
                <button type="button" class="px-4 py-2 bg-slate-500 text-white rounded-lg hover:bg-slate-600 transition">
                    Batal
                </button>
                <button type="submit" class="px-4 py-2 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition">
                    <i class="fas fa-save mr-2"></i>Simpan
                </button>
            </div>
        </form>
    </div>

    <!-- Recent Transactions -->
    <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
        <h3 class="text-lg font-semibold text-slate-800 mb-4">Transaksi Terbaru</h3>
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
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
