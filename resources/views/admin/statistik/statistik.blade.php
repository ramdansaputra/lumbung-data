@extends('layouts.admin')

@section('title', 'Statistik Kependudukan')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
    <div class="bg-white p-5 rounded-xl shadow">
        <p class="text-xs text-slate-500">Total Penduduk</p>
        <h3 class="text-2xl font-bold mt-1">{{ number_format($data['total_penduduk'] ?? 0) }}</h3>
    </div>

    <div class="bg-white p-5 rounded-xl shadow">
        <p class="text-xs text-slate-500">Laki-laki</p>
        <h3 class="text-2xl font-bold mt-1">{{ number_format($data['laki_laki'] ?? 0) }}</h3>
    </div>

    <div class="bg-white p-5 rounded-xl shadow">
        <p class="text-xs text-slate-500">Perempuan</p>
        <h3 class="text-2xl font-bold mt-1">{{ number_format($data['perempuan'] ?? 0) }}</h3>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow p-6">
        <h4 class="font-semibold mb-4 text-lg">Distribusi Jenis Kelamin</h4>
        <div class="relative h-72">
            <canvas id="genderChart"></canvas>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <h4 class="font-semibold mb-4 text-lg">Distribusi Usia</h4>
        <div class="relative h-72">
            <canvas id="ageChart"></canvas>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow p-6">
        <h4 class="font-semibold mb-4 text-lg">Tingkat Pendidikan</h4>
        <div class="relative h-72">
            <canvas id="pendidikanChart"></canvas>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <h4 class="font-semibold mb-4 text-lg">Mata Pencaharian</h4>
        <div class="relative h-72">
            <canvas id="pekerjaanChart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.js"></script>
<script>
    // Data dari backend
    const total = {{ $data['total_penduduk'] ?? 0 }};
    const laki = {{ $data['laki_laki'] ?? 0 }};
    const perempuan = {{ $data['perempuan'] ?? 0 }};

    // Usia
    const usiaData = {
        labels: ['0-5', '6-17', '18-59', '60+'],
        values: [
            {{ $data['usia']['0_5'] ?? 0 }},
            {{ $data['usia']['6_17'] ?? 0 }},
            {{ $data['usia']['18_59'] ?? 0 }},
            {{ $data['usia']['60_plus'] ?? 0 }}
        ]
    };

    // Pendidikan & Pekerjaan arrays
    const pendidikanLabels = @json(array_column($data['pendidikan'] ?? [], 'label'));
    const pendidikanValues = @json(array_column($data['pendidikan'] ?? [], 'jumlah'));

    const pekerjaanLabels = @json(array_column($data['pekerjaan'] ?? [], 'label'));
    const pekerjaanValues = @json(array_column($data['pekerjaan'] ?? [], 'jumlah'));

    // ===== GENDER CHART =====
    const genderCtx = document.getElementById('genderChart');
    if (genderCtx) {
        new Chart(genderCtx, {
            type: 'doughnut',
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    data: [laki, perempuan],
                    backgroundColor: ['#3B82F6', '#EC4899'],
                    borderColor: '#ffffff',
                    borderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom' }
                }
            }
        });
    }

    // ===== AGE BAR CHART =====
    const ageCtx = document.getElementById('ageChart');
    if (ageCtx) {
        new Chart(ageCtx, {
            type: 'bar',
            data: {
                labels: usiaData.labels,
                datasets: [{
                    label: 'Jumlah Penduduk',
                    data: usiaData.values,
                    backgroundColor: ['#FCA5A5', '#FED7AA', '#86EFAC', '#93C5FD'],
                    borderColor: '#ffffff',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    x: { ticks: { font: { size: 12 } } },
                    y: { beginAtZero: true }
                }
            }
        });
    }

    // ===== PENDIDIKAN BAR CHART =====
    const pendidikanCtx = document.getElementById('pendidikanChart');
    if (pendidikanCtx) {
        new Chart(pendidikanCtx, {
            type: 'bar',
            data: {
                labels: pendidikanLabels,
                datasets: [{
                    label: 'Jumlah',
                    data: pendidikanValues,
                    backgroundColor: '#3B82F6',
                    borderColor: '#1E40AF',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: { x: { beginAtZero: true } }
            }
        });
    }

    // ===== PEKERJAAN BAR CHART =====
    const pekerjaanCtx = document.getElementById('pekerjaanChart');
    if (pekerjaanCtx) {
        new Chart(pekerjaanCtx, {
            type: 'bar',
            data: {
                labels: pekerjaanLabels,
                datasets: [{
                    label: 'Jumlah',
                    data: pekerjaanValues,
                    backgroundColor: '#8B5CF6',
                    borderColor: '#6D28D9',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: { x: { beginAtZero: true } }
            }
        });
    }
</script>

@endsection