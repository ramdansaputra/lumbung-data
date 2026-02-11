@extends('layouts.admin')

@section('title', 'Tambah Data Pemantauan Kesehatan')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Tambah Data Pemantauan Kesehatan</h1>
        <p class="text-gray-600 mt-1">Tambahkan data pemantauan kesehatan baru</p>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-6">
        <form action="{{ route('admin.kesehatan.pemantauan.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Pilih Penduduk -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Penduduk</label>
                    <select name="penduduk_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        <option value="">Pilih Penduduk</option>
                        @foreach($penduduk as $p)
                        <option value="{{ $p->id }}">{{ $p->nama }} - {{ $p->nik }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Tanggal -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Pemantauan</label>
                    <input type="date" name="tanggal" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                </div>

                <!-- Nama Pasien -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Pasien</label>
                    <input type="text" name="nama_pasien" placeholder="Nama lengkap pasien" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                </div>

                <!-- Jenis Pemantauan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Pemantauan</label>
                    <select name="jenis_pemantauan" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        <option value="">Pilih Jenis Pemantauan</option>
                        <option value="Pemeriksaan Rutin Balita">Pemeriksaan Rutin Balita</option>
                        <option value="Pemeriksaan Kehamilan">Pemeriksaan Kehamilan</option>
                        <option value="Pemeriksaan Lansia">Pemeriksaan Lansia</option>
                        <option value="Pemeriksaan Umum">Pemeriksaan Umum</option>
                        <option value="Pemeriksaan Darah">Pemeriksaan Darah</option>
                        <option value="Pemeriksaan Gigi">Pemeriksaan Gigi</option>
                        <option value="Pemeriksaan Mata">Pemeriksaan Mata</option>
                    </select>
                </div>

                <!-- Tanggal Mulai -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                </div>

                <!-- Frekuensi -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Frekuensi</label>
                    <input type="text" name="frekuensi" placeholder="Contoh: 3 bulan, 6 bulan" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                </div>

                <!-- Petugas -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Petugas</label>
                    <select name="petugas" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        <option value="">Pilih Petugas</option>
                        <option value="Dr. Ahmad">Dr. Ahmad</option>
                        <option value="Dr. Siti">Dr. Siti</option>
                        <option value="Dr. Budi">Dr. Budi</option>
                        <option value="Suster Ani">Suster Ani</option>
                        <option value="Suster Maya">Suster Maya</option>
                    </select>
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        <option value="">Pilih Status</option>
                        <option value="aktif">Aktif</option>
                        <option value="selesai">Selesai</option>
                        <option value="ditunda">Ditunda</option>
                    </select>
                </div>

                <!-- Status Stunting -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status Stunting</label>
                    <select name="status_stunting" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Pilih Status Stunting</option>
                        <option value="normal">Normal</option>
                        <option value="stunting">Stunting</option>
                        <option value="risiko_stunting">Risiko Stunting</option>
                    </select>
                </div>
            </div>

            <!-- Catatan -->
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Catatan</label>
                <textarea name="catatan" rows="4" placeholder="Catatan tambahan tentang pemantauan..." class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-3 mt-8">
                <a href="{{ route('admin.kesehatan.pemantauan') }}" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition duration-200">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
