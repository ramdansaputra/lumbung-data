<!-- TOP INFO -->
<div class="bg-emerald-900 text-white text-xs">
    <div class="max-w-7xl mx-auto px-6 py-2 flex flex-wrap justify-between gap-2">
        <div>
            📍 Desa Suka Maju, Kec. Maju, Kab. Majubersama
        </div>
        <div class="flex gap-4">
            <span>📞 0812-3456-7890</span>
            <span>✉️ desa@sukamaju.id</span>
        </div>
    </div>
</div>

<!-- MAIN NAVBAR -->
<nav class="bg-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-emerald-600 text-white flex items-center justify-center font-bold">
                KM
            </div>
            <div>
                <div class="font-bold text-emerald-700 leading-tight">
                    Desa Suka Maju
                </div>
                <div class="text-xs text-slate-500">
                    Website Resmi Pemerintah Desa
                </div>
            </div>
        </div>

        <div class="hidden lg:flex gap-6 text-sm font-semibold text-slate-700">
            <a href="{{ url('/') }}">Beranda</a>

            <a href="#">Profil Desa</a>
            <a href="#">Pemerintahan</a>
            <a href="#">Data Desa</a>
            <a href="#">Regulasi</a>
            <a href="#">Peta</a>
            <a href="{{ url('/berita') }}">Berita</a>
            <a href="#">Layanan</a>
        </div>

        <a href="{{ url('/admin/dashboard') }}"
           class="px-5 py-2 rounded-full bg-emerald-600 text-white text-sm">
            Login Admin
        </a>
    </div>
</nav>
