@extends('layouts.admin')

@section('title', 'Tambah Dusun')

@section('content')
<div class="space-y-8">

        {{-- Header --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 bg-white rounded-2xl p-6 shadow-lg border border-slate-200">
            <div class="animate-fade-in">
                <h1 class="text-3xl font-bold bg-gradient-to-r from-slate-700 to-slate-600 bg-clip-text text-transparent">
                    Tambah Dusun
                </h1>
                <div class="flex items-center gap-2 text-sm text-slate-500 mt-2">
                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l9-9 9 9M4 10v10a1 1 0 001 1h5m4 0h5a1 1 0 001-1V10" />
                    </svg>
                    <span>Beranda</span>
                    <span>/</span>
                    <span class="text-slate-700 font-medium">Wilayah Administratif Dusun</span>
                    <span>/</span>
                    <span class="text-slate-700 font-medium">Tambah Dusun</span>
                </div>
            </div>
        </div>

        {{-- Form --}}
        <div class="bg-white rounded-2xl border border-slate-200 shadow-lg overflow-hidden">
            <div class="p-6">
                <form method="POST" action="{{ route('admin.info-desa.wilayah-administratif.store') }}">
                    @csrf

                    {{-- Nama Dusun --}}
                    <div class="mb-6">
                        <label for="nama" class="block text-sm font-bold text-slate-700 mb-2">
                            Nama Dusun <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required
                               class="w-full px-4 py-3 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-slate-500 focus:border-slate-500 transition-all duration-200"
                               placeholder="Masukkan nama dusun">
                        @error('nama')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Kepala Wilayah --}}
                    <div class="mb-6">
                        <label for="kepala_wilayah" class="block text-sm font-bold text-slate-700 mb-2">
                            Kepala Wilayah <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="kepala_wilayah" id="kepala_wilayah" value="{{ old('kepala_wilayah') }}" required
                               class="w-full px-4 py-3 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-slate-500 focus:border-slate-500 transition-all duration-200"
                               placeholder="Masukkan nama kepala wilayah">
                        @error('kepala_wilayah')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- RW dan RT --}}
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div>
                            <label for="rw" class="block text-sm font-bold text-slate-700 mb-2">
                                RW <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="rw" id="rw" value="{{ old('rw', 1) }}" min="1" required
                                   class="w-full px-4 py-3 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-slate-500 focus:border-slate-500 transition-all duration-200">
                            @error('rw')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="rt" class="block text-sm font-bold text-slate-700 mb-2">
                                RT <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="rt" id="rt" value="{{ old('rt', 1) }}" min="1" required
                                   class="w-full px-4 py-3 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-slate-500 focus:border-slate-500 transition-all duration-200">
                            @error('rt')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- KK --}}
                    <div class="mb-6">
                        <label for="kk" class="block text-sm font-bold text-slate-700 mb-2">
                            Jumlah KK (Kepala Keluarga) <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="kk" id="kk" value="{{ old('kk', 0) }}" min="0" required
                               class="w-full px-4 py-3 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-slate-500 focus:border-slate-500 transition-all duration-200">
                        @error('kk')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Laki-laki dan Perempuan --}}
                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <div>
                            <label for="laki_laki" class="block text-sm font-bold text-slate-700 mb-2">
                                Jumlah Laki-laki <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="laki_laki" id="laki_laki" value="{{ old('laki_laki', 0) }}" min="0" required
                                   class="w-full px-4 py-3 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-slate-500 focus:border-slate-500 transition-all duration-200">
                            @error('laki_laki')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="perempuan" class="block text-sm font-bold text-slate-700 mb-2">
                                Jumlah Perempuan <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="perempuan" id="perempuan" value="{{ old('perempuan', 0) }}" min="0" required
                                   class="w-full px-4 py-3 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-slate-500 focus:border-slate-500 transition-all duration-200">
                            @error('perempuan')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Buttons --}}
                    <div class="flex justify-end gap-4">
                        <a href="{{ route('admin.info-desa.wilayah-administratif') }}"
                           class="btn-secondary flex items-center gap-2 transition-all duration-200 hover:scale-105">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Batal
                        </a>
                        <button type="submit"
                                class="btn-primary flex items-center gap-2 transition-all duration-200 hover:scale-105 hover:shadow-lg">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Reusable styles --}}
<style>
    .btn-primary {
        @apply bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg text-sm font-semibold shadow;
    }

    .btn-secondary {
        @apply bg-white border border-slate-300 hover:bg-slate-100 px-4 py-2 rounded-lg text-sm font-medium;
    }
</style>
@endsection
