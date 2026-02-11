@extends('layouts.admin')

@section('title', 'Pendataan Kesehatan')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Pendataan Kesehatan</h1>
        <p class="text-gray-600 mt-1">Kelola data kesehatan masyarakat</p>
    </div>

    <!-- Filter & Search -->
    <div class="bg-white rounded-lg shadow-sm p-4 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Pencarian</label>
                <input type="text" placeholder="Cari nama, NIK..." 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Kelurahan</label>
                <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Semua Kelurahan</option>
                    <option value="kelurahan1">Kelurahan 1</option>
                    <option value="kelurahan2">Kelurahan 2</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status Kesehatan</label>
                <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Semua Status</option>
                    <option value="sehat">Sehat</option>
                    <option value="sakit">Sakit</option>
                    <option value="pemantauan">Dalam Pemantauan</option>
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
            <a href="{{ route('admin.kesehatan.pendataan.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition duration-200 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Data
            </a>
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
                Cetak
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
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIK</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Lengkap</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Pemeriksaan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Berat Badan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tinggi Badan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tekanan Darah</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status Gizi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($data as $index => $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $data->firstItem() + $index }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->penduduk->nik ?? '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->penduduk->nama ?? '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d M Y') : '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->jenis_pemeriksaan }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->berat_badan ? $item->berat_badan . ' kg' : '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->tinggi_badan ? $item->tinggi_badan . ' cm' : '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->tekanan_darah ? $item->tekanan_darah . ' mmHg' : '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($item->status_gizi == 'normal')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Normal
                                </span>
                            @elseif($item->status_gizi == 'kurang')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Kurang
                                </span>
                            @elseif($item->status_gizi == 'lebih')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                    Lebih
                                </span>
                            @elseif($item->status_gizi == 'obesitas')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Obesitas
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                    -
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex gap-2">
                                <button onclick="detailModal({{ $item->id }})" class="text-blue-600 hover:text-blue-900">Detail</button>
                                <button onclick="editModal({{ $item->id }})" class="text-yellow-600 hover:text-yellow-900">Edit</button>
                                <form method="POST" action="{{ route('admin.kesehatan.pendataan.destroy', $item->id) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="text-red-600 hover:text-red-900">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="px-6 py-4 text-center text-gray-500">
                            Belum ada data kesehatan yang tercatat
                        </td>
                    </tr>
                    @endforelse
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
                        Menampilkan <span class="font-medium">1</span> sampai <span class="font-medium">10</span> dari <span class="font-medium">97</span> hasil
                    </p>
                </div>
                <div>
                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        <button class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Previous</span>
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">1</button>
                        <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">2</button>
                        <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">3</button>
                        <button class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Next</span>
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Detail -->
<div id="detailModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-900">Detail Data Kesehatan</h3>
                <button onclick="closeDetailModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <div id="detailContent" class="space-y-4">
                <!-- Detail content will be populated here -->
            </div>

            <div class="flex justify-end gap-3 mt-6">
                <button onclick="closeDetailModal()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition duration-200">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Create/Edit -->
<div id="crudModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-900" id="modalTitle">Tambah Data Kesehatan</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form id="crudForm" method="POST">
                @csrf
                <input type="hidden" name="_method" id="methodField" value="POST">
                <input type="hidden" name="id" id="recordId">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Penduduk</label>
                        <select name="penduduk_id" id="pendudukSelect" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                            <option value="">Pilih Penduduk</option>
                            @foreach($penduduk as $p)
                            <option value="{{ $p->id }}">{{ $p->nama }} - {{ $p->nik }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggalInput" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Pemeriksaan</label>
                        <input type="text" name="jenis_pemeriksaan" id="jenisPemeriksaanInput" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Berat Badan (kg)</label>
                        <input type="number" step="0.1" name="berat_badan" id="beratBadanInput" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tinggi Badan (cm)</label>
                        <input type="number" step="0.1" name="tinggi_badan" id="tinggiBadanInput" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tekanan Darah (mmHg)</label>
                        <input type="text" name="tekanan_darah" id="tekananDarahInput" placeholder="120/80" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status Gizi</label>
                        <select name="status_gizi" id="statusGiziSelect" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">Pilih Status Gizi</option>
                            <option value="normal">Normal</option>
                            <option value="kurang">Kurang</option>
                            <option value="lebih">Lebih</option>
                            <option value="obesitas">Obesitas</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Keterangan</label>
                    <textarea name="keterangan" id="keteranganInput" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                </div>

                <div class="flex justify-end gap-3 mt-6">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition duration-200">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openModal() {
    document.getElementById('crudModal').classList.remove('hidden');
    document.getElementById('modalTitle').textContent = 'Tambah Data Kesehatan';
    document.getElementById('crudForm').action = '{{ route("admin.kesehatan.pendataan.store") }}';
    document.getElementById('methodField').value = 'POST';
    document.getElementById('recordId').value = '';
    resetForm();
}

function editModal(id) {
    fetch(`/admin/kesehatan/pendataan/${id}/edit`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('crudModal').classList.remove('hidden');
            document.getElementById('modalTitle').textContent = 'Edit Data Kesehatan';
            document.getElementById('crudForm').action = `/admin/kesehatan/pendataan/${id}`;
            document.getElementById('methodField').value = 'PUT';
            document.getElementById('recordId').value = id;

            // Fill form with data
            document.getElementById('pendudukSelect').value = data.penduduk_id;
            document.getElementById('tanggalInput').value = data.tanggal;
            document.getElementById('jenisPemeriksaanInput').value = data.jenis_pemeriksaan;
            document.getElementById('beratBadanInput').value = data.berat_badan;
            document.getElementById('tinggiBadanInput').value = data.tinggi_badan;
            document.getElementById('tekananDarahInput').value = data.tekanan_darah;
            document.getElementById('statusGiziSelect').value = data.status_gizi;
            document.getElementById('keteranganInput').value = data.keterangan;
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat memuat data');
        });
}

function detailModal(id) {
    fetch(`/admin/kesehatan/pendataan/${id}/edit`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('detailModal').classList.remove('hidden');

            // Populate detail content
            const content = document.getElementById('detailContent');
            content.innerHTML = `
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">NIK</label>
                        <p class="mt-1 text-sm text-gray-900">${data.penduduk ? data.penduduk.nik : '-'}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <p class="mt-1 text-sm text-gray-900">${data.penduduk ? data.penduduk.nama : '-'}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <p class="mt-1 text-sm text-gray-900">${data.tanggal ? new Date(data.tanggal).toLocaleDateString('id-ID') : '-'}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jenis Pemeriksaan</label>
                        <p class="mt-1 text-sm text-gray-900">${data.jenis_pemeriksaan || '-'}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Berat Badan</label>
                        <p class="mt-1 text-sm text-gray-900">${data.berat_badan ? data.berat_badan + ' kg' : '-'}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tinggi Badan</label>
                        <p class="mt-1 text-sm text-gray-900">${data.tinggi_badan ? data.tinggi_badan + ' cm' : '-'}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tekanan Darah</label>
                        <p class="mt-1 text-sm text-gray-900">${data.tekanan_darah ? data.tekanan_darah + ' mmHg' : '-'}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Status Gizi</label>
                        <p class="mt-1 text-sm text-gray-900">${data.status_gizi ? data.status_gizi.charAt(0).toUpperCase() + data.status_gizi.slice(1) : '-'}</p>
                    </div>
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700">Keterangan</label>
                    <p class="mt-1 text-sm text-gray-900">${data.keterangan || '-'}</p>
                </div>
            `;
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat memuat data');
        });
}

function closeModal() {
    document.getElementById('crudModal').classList.add('hidden');
    resetForm();
}

function closeDetailModal() {
    document.getElementById('detailModal').classList.add('hidden');
}

function resetForm() {
    document.getElementById('pendudukSelect').value = '';
    document.getElementById('tanggalInput').value = '';
    document.getElementById('jenisPemeriksaanInput').value = '';
    document.getElementById('beratBadanInput').value = '';
    document.getElementById('tinggiBadanInput').value = '';
    document.getElementById('tekananDarahInput').value = '';
    document.getElementById('statusGiziSelect').value = '';
    document.getElementById('keteranganInput').value = '';
}

// Close modal when clicking outside
document.getElementById('crudModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});

document.getElementById('detailModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeDetailModal();
    }
});

// Handle form submission with AJAX
document.getElementById('crudForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    const method = formData.get('_method');
    const url = this.action;

    fetch(url, {
        method: method,
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            closeModal();
            location.reload(); // Refresh page to show updated data
        } else {
            let errorMessage = data.message || 'Unknown error';
            if (data.errors) {
                errorMessage += '\n\nDetail error:\n';
                for (let field in data.errors) {
                    errorMessage += '- ' + data.errors[field].join(', ') + '\n';
                }
            }
            alert('Terjadi kesalahan: ' + errorMessage);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat menyimpan data');
    });
});
</script>
@endsection
