@extends('layouts.admin')

@section('title', 'Edit Data Kesehatan')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Edit Data Kesehatan</h1>
        <p class="text-gray-600 mt-1">Edit data kesehatan</p>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-6">
        <form method="POST" action="{{ route('admin.kesehatan.pendataan.update', $data->id) }}">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Penduduk</label>
                    <select name="penduduk_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        <option value="">Pilih Penduduk</option>
                        @foreach($penduduk as $p)
                        <option value="{{ $p->id }}" {{ $data->penduduk_id == $p->id ? 'selected' : '' }}>{{ $p->nama }} - {{ $p->nik }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
                    <input type="date" name="tanggal" value="{{ $data->tanggal }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Pemeriksaan</label>
                    <input type="text" name="jenis_pemeriksaan" value="{{ $data->jenis_pemeriksaan }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Berat Badan (kg)</label>
                    <input type="number" step="0.1" name="berat_badan" value="{{ $data->berat_badan }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tinggi Badan (cm)</label>
                    <input type="number" step="0.1" name="tinggi_badan" value="{{ $data->tinggi_badan }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tekanan Darah (mmHg)</label>
                    <input type="text" name="tekanan_darah" value="{{ $data->tekanan_darah }}" placeholder="120/80" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status Gizi</label>
                    <select name="status_gizi" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Pilih Status Gizi</option>
                        <option value="normal" {{ $data->status_gizi == 'normal' ? 'selected' : '' }}>Normal</option>
                        <option value="kurang" {{ $data->status_gizi == 'kurang' ? 'selected' : '' }}>Kurang</option>
                        <option value="lebih" {{ $data->status_gizi == 'lebih' ? 'selected' : '' }}>Lebih</option>
                        <option value="obesitas" {{ $data->status_gizi == 'obesitas' ? 'selected' : '' }}>Obesitas</option>
                    </select>
                </div>
            </div>

            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Keterangan</label>
                <textarea name="keterangan" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ $data->keterangan }}</textarea>
            </div>

            <div class="flex justify-end gap-3 mt-6">
                <a href="{{ route('admin.kesehatan.pendataan') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition duration-200">
                    Batal
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
