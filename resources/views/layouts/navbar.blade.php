<!-- Navbar -->
<nav class="bg-emerald-700 text-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between">
            <!-- Logo & Brand -->
            <div class="flex items-center gap-3">
                @if(config('app.logo'))
                    <img src="{{ config('app.logo') }}" alt="Logo" class="h-10 w-10 object-contain">
                @endif
                <div>
                    <h1 class="text-lg font-bold">{{ config('app.village_name', 'Pemerintah Desa') }}</h1>
                    <p class="text-xs text-emerald-100">{{ config('app.district', 'Kecamatan') }}</p>
                </div>
            </div>

            <!-- Navigation Menu -->
            <div class="hidden md:flex items-center gap-6">
                <a href="{{ route('home') }}" class="hover:text-emerald-100 transition">Beranda</a>
                <a href="{{ route('profil') }}" class="hover:text-emerald-100 transition">Profil Desa</a>
                <a href="{{ route('pemerintahan') }}" class="hover:text-emerald-100 transition">Pemerintahan</a>
                <a href="{{ route('data-desa') }}" class="hover:text-emerald-100 transition">Data Desa</a>
                <a href="{{ route('wilayah') }}" class="hover:text-emerald-100 transition">Wilayah</a>
                <a href="{{ route('artikel') }}" class="hover:text-emerald-100 transition">Berita</a>
                <a href="{{ route('kontak') }}" class="hover:text-emerald-100 transition">Kontak</a>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="md:hidden">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden mt-4 pb-4 border-t border-emerald-600 pt-4">
            <a href="{{ route('home') }}" class="block py-2 hover:text-emerald-100">Beranda</a>
            <a href="{{ route('profil') }}" class="block py-2 hover:text-emerald-100">Profil Desa</a>
            <a href="{{ route('pemerintahan') }}" class="block py-2 hover:text-emerald-100">Pemerintahan</a>
            <a href="{{ route('data-desa') }}" class="block py-2 hover:text-emerald-100">Data Desa</a>
            <a href="{{ route('wilayah') }}" class="block py-2 hover:text-emerald-100">Wilayah</a>
            <a href="{{ route('artikel') }}" class="block py-2 hover:text-emerald-100">Berita</a>
            <a href="{{ route('kontak') }}" class="block py-2 hover:text-emerald-100">Kontak</a>
        </div>
    </div>
</nav>

<script>
    document.getElementById('mobile-menu-btn')?.addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>
