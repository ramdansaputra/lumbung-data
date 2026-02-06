@extends('layouts.admin')

@section('title', 'Statistik Desa')

@section('content')

<!-- ================= RINGKASAN UTAMA ================= -->
<div class="grid grid-cols-1 md:grid-cols-6 gap-4 mb-8">

    <div class="bg-white p-5 rounded-xl shadow">
        <p class="text-xs text-slate-500">Total Penduduk</p>
        <h3 class="text-2xl font-bold mt-1">{{ $data['total_penduduk'] }}</h3>
    </div>

    <div class="bg-white p-5 rounded-xl shadow">
        <p class="text-xs text-slate-500">Kepala Keluarga</p>
        <h3 class="text-2xl font-bold mt-1">{{ $data['kepala_keluarga'] }}</h3>
    </div>

    <div class="bg-white p-5 rounded-xl shadow">
        <p class="text-xs text-slate-500">RT / RW</p>
        <h3 class="text-2xl font-bold mt-1">{{ $data['rt'] }} / {{ $data['rw'] }}</h3>
    </div>

    <div class="bg-white p-5 rounded-xl shadow text-blue-600">
        <p class="text-xs">Laki-laki</p>
        <h3 class="text-2xl font-bold mt-1">{{ $data['laki_laki'] }}</h3>
    </div>

    <div class="bg-white p-5 rounded-xl shadow text-pink-600">
        <p class="text-xs">Perempuan</p>
        <h3 class="text-2xl font-bold mt-1">{{ $data['perempuan'] }}</h3>
    </div>

    <div class="bg-white p-5 rounded-xl shadow text-green-600">
        <p class="text-xs">Rasio Gender</p>
        <h3 class="text-2xl font-bold mt-1">
            {{ round(($data['laki_laki'] / $data['perempuan']) * 100, 1) }}%
        </h3>
    </div>

</div>

<!-- ================= KEPENDUDUKAN ================= -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

    <!-- USIA -->
    <div class="bg-white rounded-xl shadow p-6">
        <h4 class="font-semibold mb-4">Distribusi Usia</h4>
        @foreach($data['usia'] as $label => $jumlah)
        <div class="mb-3">
            <div class="flex justify-between text-xs mb-1">
                <span class="capitalize">{{ $label }}</span>
                <span>{{ $jumlah }}</span>
            </div>
            <div class="w-full bg-slate-200 h-2 rounded-full">
                <div class="bg-green-600 h-2 rounded-full"
                     style="width: {{ ($jumlah / $data['total_penduduk']) * 100 }}%">
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- PENDIDIKAN -->
    <div class="bg-white rounded-xl shadow p-6">
        <h4 class="font-semibold mb-4">Tingkat Pendidikan</h4>

        @foreach($data['pendidikan'] as $item)
        <div class="flex justify-between text-sm border-b py-2">
            <span>{{ $item['label'] }}</span>
            <span class="font-semibold">{{ $item['jumlah'] }}</span>
        </div>
        @endforeach
    </div>

    <!-- PEKERJAAN -->
    <div class="bg-white rounded-xl shadow p-6">
        <h4 class="font-semibold mb-4">Mata Pencaharian</h4>

        @foreach($data['pekerjaan'] as $item)
        <div class="flex justify-between text-sm border-b py-2">
            <span>{{ $item['label'] }}</span>
            <span class="font-semibold">{{ $item['jumlah'] }}</span>
        </div>
        @endforeach
    </div>

</div>

<!-- ================= SOSIAL EKONOMI ================= -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

    <!-- AGAMA -->
    <div class="bg-white rounded-xl shadow p-6">
        <h4 class="font-semibold mb-4">Agama</h4>
        @foreach($data['agama'] as $item)
        <div class="flex justify-between text-sm border-b py-2">
            <span>{{ $item['label'] }}</span>
            <span class="font-semibold">{{ $item['jumlah'] }}</span>
        </div>
        @endforeach
    </div>

    <!-- STATUS EKONOMI -->
    <div class="bg-white rounded-xl shadow p-6">
        <h4 class="font-semibold mb-4">Status Ekonomi</h4>
        @foreach($data['ekonomi'] as $item)
        <div class="flex justify-between text-sm border-b py-2">
            <span>{{ $item['label'] }}</span>
            <span class="font-semibold">{{ $item['jumlah'] }}</span>
        </div>
        @endforeach
    </div>

</div>

<!-- ================= PERUMAHAN ================= -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

    <div class="bg-white rounded-xl shadow p-6">
        <h4 class="font-semibold mb-4">Status Rumah</h4>
        @foreach($data['rumah'] as $item)
        <div class="flex justify-between text-sm border-b py-2">
            <span>{{ $item['label'] }}</span>
            <span class="font-semibold">{{ $item['jumlah'] }}</span>
        </div>
        @endforeach
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <h4 class="font-semibold mb-4">Sumber Air</h4>
        @foreach($data['air'] as $item)
        <div class="flex justify-between text-sm border-b py-2">
            <span>{{ $item['label'] }}</span>
            <span class="font-semibold">{{ $item['jumlah'] }}</span>
        </div>
        @endforeach
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <h4 class="font-semibold mb-4">Sumber Listrik</h4>
        @foreach($data['listrik'] as $item)
        <div class="flex justify-between text-sm border-b py-2">
            <span>{{ $item['label'] }}</span>
            <span class="font-semibold">{{ $item['jumlah'] }}</span>
        </div>
        @endforeach
    </div>

</div>

<!-- ================= MUTASI ================= -->
<div class="bg-white rounded-xl shadow p-6">
    <h4 class="font-semibold mb-4">Mutasi Penduduk (Tahun Berjalan)</h4>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 text-sm">
        <div class="p-4 bg-slate-50 rounded-lg text-center">
            <p class="text-slate-500">Kelahiran</p>
            <p class="text-xl font-bold">{{ $data['mutasi']['lahir'] }}</p>
        </div>
        <div class="p-4 bg-slate-50 rounded-lg text-center">
            <p class="text-slate-500">Kematian</p>
            <p class="text-xl font-bold">{{ $data['mutasi']['meninggal'] }}</p>
        </div>
        <div class="p-4 bg-slate-50 rounded-lg text-center">
            <p class="text-slate-500">Pendatang</p>
            <p class="text-xl font-bold">{{ $data['mutasi']['datang'] }}</p>
        </div>
        <div class="p-4 bg-slate-50 rounded-lg text-center">
            <p class="text-slate-500">Pindah</p>
            <p class="text-xl font-bold">{{ $data['mutasi']['pindah'] }}</p>
        </div>
    </div>
</div>

@endsection
