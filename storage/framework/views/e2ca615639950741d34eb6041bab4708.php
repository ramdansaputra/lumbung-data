<?php $__env->startSection('title', 'Pengaduan'); ?>

<?php $__env->startSection('content'); ?>

<div class="space-y-6">

    <!-- HEADER -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Pengaduan</h1>
                <p class="text-slate-600">Kelola pengaduan dan keluhan masyarakat</p>
            </div>

            <div class="flex gap-3">
                <button class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                    Tambah Pengaduan
                </button>
                <button class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                    Laporan
                </button>
            </div>
        </div>
    </div>

    <!-- STATS CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-500">Total Pengaduan</p>
                    <p class="text-2xl font-bold text-slate-700"><?php echo e($data['total_pengaduan']); ?></p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <span class="text-xl">📋</span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-500">Belum Ditanggapi</p>
                    <p class="text-2xl font-bold text-yellow-600"><?php echo e($data['belum_ditanggapi']); ?></p>
                </div>
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <span class="text-xl">⏳</span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-500">Sedang Diproses</p>
                    <p class="text-2xl font-bold text-blue-600"><?php echo e($data['sedang_diproses']); ?></p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <span class="text-xl">🔄</span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-500">Selesai</p>
                    <p class="text-2xl font-bold text-green-600"><?php echo e($data['selesai']); ?></p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <span class="text-xl">✅</span>
                </div>
            </div>
        </div>
    </div>

    <!-- PENGADUAN TABLE -->
    <div class="bg-white rounded-2xl shadow">
        <div class="p-6 border-b">
            <h3 class="text-lg font-semibold text-slate-700">Daftar Pengaduan</h3>
        </div>

        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left py-3 px-4 font-semibold text-slate-600">No. Pengaduan</th>
                            <th class="text-left py-3 px-4 font-semibold text-slate-600">Nama Pelapor</th>
                            <th class="text-left py-3 px-4 font-semibold text-slate-600">Kategori</th>
                            <th class="text-left py-3 px-4 font-semibold text-slate-600">Subjek</th>
                            <th class="text-left py-3 px-4 font-semibold text-slate-600">Status</th>
                            <th class="text-left py-3 px-4 font-semibold text-slate-600">Tanggal</th>
                            <th class="text-left py-3 px-4 font-semibold text-slate-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b hover:bg-slate-50">
                            <td class="py-4 px-4 font-medium">#PGD-2024-001</td>
                            <td class="py-4 px-4">
                                <div>
                                    <p class="font-medium text-slate-700">Ahmad Rahman</p>
                                    <p class="text-sm text-slate-500">Jl. Raya No. 45</p>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">
                                    Infrastruktur
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <div>
                                    <p class="font-medium text-slate-700">Jalan Rusak</p>
                                    <p class="text-sm text-slate-500">Jalan di RT 02 RW 01...</p>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-medium">
                                    Belum Ditanggapi
                                </span>
                            </td>
                            <td class="py-4 px-4 text-sm">15 Jan 2024</td>
                            <td class="py-4 px-4">
                                <div class="flex gap-2">
                                    <button class="px-3 py-1 bg-blue-500 text-white rounded-lg text-xs hover:bg-blue-600">
                                        Tanggapi
                                    </button>
                                    <button class="px-3 py-1 bg-slate-500 text-white rounded-lg text-xs hover:bg-slate-600">
                                        Detail
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="border-b hover:bg-slate-50">
                            <td class="py-4 px-4 font-medium">#PGD-2024-002</td>
                            <td class="py-4 px-4">
                                <div>
                                    <p class="font-medium text-slate-700">Siti Aminah</p>
                                    <p class="text-sm text-slate-500">Jl. Melati No. 12</p>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">
                                    Kesehatan
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <div>
                                    <p class="font-medium text-slate-700">Posyandu Kurang Bersih</p>
                                    <p class="text-sm text-slate-500">Fasilitas posyandu perlu...</p>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">
                                    Sedang Diproses
                                </span>
                            </td>
                            <td class="py-4 px-4 text-sm">14 Jan 2024</td>
                            <td class="py-4 px-4">
                                <div class="flex gap-2">
                                    <button class="px-3 py-1 bg-blue-500 text-white rounded-lg text-xs hover:bg-blue-600">
                                        Tanggapi
                                    </button>
                                    <button class="px-3 py-1 bg-slate-500 text-white rounded-lg text-xs hover:bg-slate-600">
                                        Detail
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="border-b hover:bg-slate-50">
                            <td class="py-4 px-4 font-medium">#PGD-2024-003</td>
                            <td class="py-4 px-4">
                                <div>
                                    <p class="font-medium text-slate-700">Budi Santoso</p>
                                    <p class="text-sm text-slate-500">Jl. Mawar No. 8</p>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium">
                                    Keamanan
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <div>
                                    <p class="font-medium text-slate-700">Pencurian Sepeda Motor</p>
                                    <p class="text-sm text-slate-500">Kejadian pencurian di...</p>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">
                                    Selesai
                                </span>
                            </td>
                            <td class="py-4 px-4 text-sm">12 Jan 2024</td>
                            <td class="py-4 px-4">
                                <div class="flex gap-2">
                                    <button class="px-3 py-1 bg-blue-500 text-white rounded-lg text-xs hover:bg-blue-600">
                                        Tanggapi
                                    </button>
                                    <button class="px-3 py-1 bg-slate-500 text-white rounded-lg text-xs hover:bg-slate-600">
                                        Detail
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="border-b hover:bg-slate-50">
                            <td class="py-4 px-4 font-medium">#PGD-2024-004</td>
                            <td class="py-4 px-4">
                                <div>
                                    <p class="font-medium text-slate-700">Dewi Sartika</p>
                                    <p class="text-sm text-slate-500">Jl. Anggrek No. 25</p>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-xs font-medium">
                                    Lingkungan
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <div>
                                    <p class="font-medium text-slate-700">Sampah Menumpuk</p>
                                    <p class="text-sm text-slate-500">Tempat sampah penuh...</p>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-medium">
                                    Belum Ditanggapi
                                </span>
                            </td>
                            <td class="py-4 px-4 text-sm">10 Jan 2024</td>
                            <td class="py-4 px-4">
                                <div class="flex gap-2">
                                    <button class="px-3 py-1 bg-blue-500 text-white rounded-lg text-xs hover:bg-blue-600">
                                        Tanggapi
                                    </button>
                                    <button class="px-3 py-1 bg-slate-500 text-white rounded-lg text-xs hover:bg-slate-600">
                                        Detail
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="border-b hover:bg-slate-50">
                            <td class="py-4 px-4 font-medium">#PGD-2024-005</td>
                            <td class="py-4 px-4">
                                <div>
                                    <p class="font-medium text-slate-700">Rina Melati</p>
                                    <p class="text-sm text-slate-500">Jl. Kenanga No. 7</p>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="px-3 py-1 bg-cyan-100 text-cyan-700 rounded-full text-xs font-medium">
                                    Administrasi
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <div>
                                    <p class="font-medium text-slate-700">KTP Hilang</p>
                                    <p class="text-sm text-slate-500">Bantuan pengurusan...</p>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">
                                    Sedang Diproses
                                </span>
                            </td>
                            <td class="py-4 px-4 text-sm">08 Jan 2024</td>
                            <td class="py-4 px-4">
                                <div class="flex gap-2">
                                    <button class="px-3 py-1 bg-blue-500 text-white rounded-lg text-xs hover:bg-blue-600">
                                        Tanggapi
                                    </button>
                                    <button class="px-3 py-1 bg-slate-500 text-white rounded-lg text-xs hover:bg-slate-600">
                                        Detail
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- CHART SECTION -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-2xl shadow p-6">
            <h3 class="text-lg font-semibold text-slate-700 mb-4">Distribusi Kategori Pengaduan</h3>
            <canvas id="kategoriPengaduanChart"></canvas>
        </div>

        <div class="bg-white rounded-2xl shadow p-6">
            <h3 class="text-lg font-semibold text-slate-700 mb-4">Status Pengaduan</h3>
            <canvas id="statusPengaduanChart"></canvas>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Kategori Pengaduan Chart
    const kategoriCtx = document.getElementById('kategoriPengaduanChart').getContext('2d');
    new Chart(kategoriCtx, {
        type: 'doughnut',
        data: {
            labels: ['Infrastruktur', 'Kesehatan', 'Keamanan', 'Lingkungan', 'Administrasi', 'Lainnya'],
            datasets: [{
                data: [35, 25, 20, 18, 15, 14],
                backgroundColor: ['#3B82F6', '#10B981', '#F59E0B', '#8B5CF6', '#06B6D4', '#6B7280']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                }
            }
        }
    });

    // Status Pengaduan Chart
    const statusCtx = document.getElementById('statusPengaduanChart').getContext('2d');
    new Chart(statusCtx, {
        type: 'bar',
        data: {
            labels: ['Belum Ditanggapi', 'Sedang Diproses', 'Selesai'],
            datasets: [{
                label: 'Jumlah Pengaduan',
                data: [23, 15, 89],
                backgroundColor: ['#F59E0B', '#3B82F6', '#10B981']
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\lumbung-data\resources\views/admin/pengaduan.blade.php ENDPATH**/ ?>