@extends('layouts.admin')

@section('title', 'Pengaduan Kehadiran')

@section('content')
<div class="min-h-screen bg-slate-100 p-6">
    <div class="max-w-7xl mx-auto">

        <!-- HEADER -->
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-extrabold text-slate-800">Pengaduan Kehadiran</h1>
                <p class="text-sm text-slate-500">Kelola pengaduan terkait kehadiran pegawai</p>
            </div>

            <button class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-emerald-600 to-green-600 hover:from-emerald-700 hover:to-green-700 text-white text-sm font-bold rounded-xl shadow-md transition" onclick="openModal()">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Ajukan Pengaduan
            </button>
        </div>

        <!-- TABLE -->
        <div class="bg-white rounded-2xl shadow-md border border-slate-200 overflow-hidden">

            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-slate-200">
                                <th class="text-left py-3 px-4 font-semibold text-slate-600">Tanggal</th>
                                <th class="text-left py-3 px-4 font-semibold text-slate-600">Nama Pegawai</th>
                                <th class="text-left py-3 px-4 font-semibold text-slate-600">Jenis Pengaduan</th>
                                <th class="text-left py-3 px-4 font-semibold text-slate-600">Status</th>
                                <th class="text-left py-3 px-4 font-semibold text-slate-600">Keterangan</th>
                                <th class="text-center py-3 px-4 font-semibold text-slate-600">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample data - replace with dynamic data -->
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 px-4">2024-01-15</td>
                                <td class="py-3 px-4 font-medium">Ahmad Surya</td>
                                <td class="py-3 px-4">Terlambat</td>
                                <td class="py-3 px-4">
                                    <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-medium">Diproses</span>
                                </td>
                                <td class="py-3 px-4">Kendaraan mogok</td>
                                <td class="py-3 px-4 text-center">
                                    <div class="flex justify-center gap-2">
                                        <button class="p-1 text-blue-600 hover:bg-blue-50 rounded" title="Proses">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </button>
                                        <button class="p-1 text-green-600 hover:bg-green-50 rounded" title="Selesai">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </button>
                                    </div>
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

<!-- MODAL -->
<div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-2xl shadow-xl max-w-md w-full">
            <div class="p-6">
                <h3 class="text-lg font-bold text-slate-800 mb-4">Ajukan Pengaduan</h3>

                <form>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-600 mb-1">Tanggal</label>
                            <input type="date" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-600 mb-1">Nama Pegawai</label>
                            <input type="text" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" placeholder="Masukkan nama pegawai">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-600 mb-1">Jenis Pengaduan</label>
                            <select class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                <option value="terlambat">Terlambat</option>
                                <option value="izin">Izin</option>
                                <option value="absen">Absen</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-600 mb-1">Keterangan</label>
                            <textarea class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" rows="3" placeholder="Jelaskan pengaduan"></textarea>
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 mt-6">
                        <button type="button" class="px-4 py-2 text-slate-600 hover:bg-slate-100 rounded-lg transition" onclick="closeModal()">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">Ajukan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function openModal() {
    document.getElementById('modal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('modal').classList.add('hidden');
}
</script>
@endsection
