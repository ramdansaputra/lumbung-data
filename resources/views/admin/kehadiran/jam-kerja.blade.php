@extends('layouts.admin')

@section('title', 'Jam Kerja')

@section('content')
<div class="min-h-screen bg-slate-100 p-6">
    <div class="max-w-7xl mx-auto">

        <!-- HEADER -->
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-extrabold text-slate-800">Jam Kerja</h1>
                <p class="text-sm text-slate-500">Pengaturan jam kerja dan shift pegawai</p>
            </div>

            <button class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-emerald-600 to-green-600 hover:from-emerald-700 hover:to-green-700 text-white text-sm font-bold rounded-xl shadow-md transition" onclick="openModal()">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Tambah Shift
            </button>
        </div>

        <!-- SETTINGS -->
        <div class="bg-white rounded-2xl shadow-md border border-slate-200 p-6 mb-6">
            <h3 class="text-lg font-bold text-slate-800 mb-4">Pengaturan Jam Kerja</h3>

            <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-1">Jam Masuk</label>
                        <input type="time" value="08:00" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-1">Jam Pulang</label>
                        <input type="time" value="16:00" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-1">Jam Istirahat (menit)</label>
                        <input type="number" value="60" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                    </div>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-1">Toleransi Terlambat (menit)</label>
                        <input type="number" value="15" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" id="weekend" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                        <label for="weekend" class="ml-2 text-sm text-slate-600">Aktifkan kerja weekend</label>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">Simpan Pengaturan</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- SHIFT TABLE -->
        <div class="bg-white rounded-2xl shadow-md border border-slate-200 overflow-hidden">

            <div class="p-6">
                <h3 class="text-lg font-bold text-slate-800 mb-4">Daftar Shift</h3>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-slate-200">
                                <th class="text-left py-3 px-4 font-semibold text-slate-600">Nama Shift</th>
                                <th class="text-left py-3 px-4 font-semibold text-slate-600">Jam Masuk</th>
                                <th class="text-left py-3 px-4 font-semibold text-slate-600">Jam Pulang</th>
                                <th class="text-left py-3 px-4 font-semibold text-slate-600">Status</th>
                                <th class="text-center py-3 px-4 font-semibold text-slate-600">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample data - replace with dynamic data -->
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 px-4 font-medium">Shift Pagi</td>
                                <td class="py-3 px-4">08:00</td>
                                <td class="py-3 px-4">16:00</td>
                                <td class="py-3 px-4">
                                    <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Aktif</span>
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <div class="flex justify-center gap-2">
                                        <button class="p-1 text-blue-600 hover:bg-blue-50 rounded" title="Edit">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                        <button class="p-1 text-red-600 hover:bg-red-50 rounded" title="Hapus">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
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
                <h3 class="text-lg font-bold text-slate-800 mb-4">Tambah Shift Kerja</h3>

                <form>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-600 mb-1">Nama Shift</label>
                            <input type="text" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" placeholder="Masukkan nama shift">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-600 mb-1">Jam Masuk</label>
                            <input type="time" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-600 mb-1">Jam Pulang</label>
                            <input type="time" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="status" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                            <label for="status" class="ml-2 text-sm text-slate-600">Aktifkan shift ini</label>
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 mt-6">
                        <button type="button" class="px-4 py-2 text-slate-600 hover:bg-slate-100 rounded-lg transition" onclick="closeModal()">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">Simpan</button>
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
