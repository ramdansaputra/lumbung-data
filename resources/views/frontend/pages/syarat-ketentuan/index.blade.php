@extends('layouts.app')

@section('title', 'Syarat & Ketentuan')
@section('description', 'Syarat dan ketentuan penggunaan layanan website Desa Serayu Larangan')

@section('content')

<x-hero-section 
    title="Syarat & Ketentuan"
    subtitle="Ketentuan penggunaan layanan digital dan akses informasi pada website resmi Pemerintah Desa."
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('home')],
        ['label' => 'Syarat & Ketentuan', 'url' => '#']
    ]"
/>

<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-12">
            
            <div class="lg:w-1/4">
                <div class="sticky top-24 bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Daftar Isi</h3>
                    <nav class="space-y-1">
                        <a href="#pendahuluan" class="block px-3 py-2 text-sm font-medium text-emerald-600 bg-emerald-50 rounded-lg transition">Pendahuluan</a>
                        <a href="#penggunaan" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-emerald-600 hover:bg-gray-50 rounded-lg transition">Penggunaan Layanan</a>
                        <a href="#hak-cipta" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-emerald-600 hover:bg-gray-50 rounded-lg transition">Hak Kekayaan Intelektual</a>
                        <a href="#tanggung-jawab" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-emerald-600 hover:bg-gray-50 rounded-lg transition">Batasan Tanggung Jawab</a>
                        <a href="#perubahan" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-emerald-600 hover:bg-gray-50 rounded-lg transition">Perubahan Ketentuan</a>
                    </nav>
                    
                    <div class="mt-8 pt-6 border-t border-gray-100">
                        <p class="text-xs text-gray-400 mb-2">Terakhir Diperbarui:</p>
                        <p class="text-sm font-semibold text-gray-700">{{ $lastUpdated ?? date('d M Y') }}</p>
                    </div>
                </div>
            </div>

            <div class="lg:w-3/4">
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 lg:p-12">
                    
                    <div id="pendahuluan" class="mb-12 scroll-mt-28">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                            <span class="w-8 h-8 rounded-lg bg-emerald-100 flex items-center justify-center text-emerald-600 text-lg">📜</span>
                            Pendahuluan
                        </h2>
                        <div class="prose prose-emerald text-gray-600 leading-relaxed text-justify">
                            <p>
                                Selamat datang di Website Resmi Pemerintah Desa <strong>{{ config('app.village_name', 'Serayu Larangan') }}</strong>. Halaman ini memuat Syarat dan Ketentuan yang mengatur akses serta penggunaan Anda terhadap seluruh layanan dan konten yang tersedia di website ini.
                            </p>
                            <p class="mt-4">
                                Dengan mengakses atau menggunakan website ini, Anda dianggap telah membaca, memahami, dan menyetujui untuk terikat oleh Syarat dan Ketentuan ini. Jika Anda tidak setuju dengan bagian apapun dari ketentuan ini, mohon untuk tidak melanjutkan penggunaan website.
                            </p>
                        </div>
                    </div>

                    <hr class="border-gray-100 my-10">

                    <div id="penggunaan" class="mb-12 scroll-mt-28">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                            <span class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600 text-lg">💻</span>
                            Penggunaan Layanan
                        </h2>
                        <ul class="space-y-4 text-gray-600">
                            <li class="flex items-start gap-4">
                                <span class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-xs mt-0.5">1</span>
                                <p>Website ini disediakan untuk tujuan informasi publik, pelayanan administrasi desa (surat menyurat online), dan transparansi pemerintahan.</p>
                            </li>
                            <li class="flex items-start gap-4">
                                <span class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-xs mt-0.5">2</span>
                                <p>Anda setuju untuk menggunakan website ini hanya untuk tujuan yang sah dan tidak melanggar hukum atau peraturan yang berlaku.</p>
                            </li>
                            <li class="flex items-start gap-4">
                                <span class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-xs mt-0.5">3</span>
                                <p>Dilarang keras melakukan upaya peretasan, penyebaran virus, atau tindakan lain yang dapat mengganggu kinerja atau keamanan sistem website desa.</p>
                            </li>
                            <li class="flex items-start gap-4">
                                <span class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-xs mt-0.5">4</span>
                                <p>Untuk layanan yang membutuhkan data pribadi (seperti permohonan surat), Anda wajib memberikan data yang <strong>benar, akurat, dan terbaru</strong>.</p>
                            </li>
                        </ul>
                    </div>

                    <hr class="border-gray-100 my-10">

                    <div id="hak-cipta" class="mb-12 scroll-mt-28">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                            <span class="w-8 h-8 rounded-lg bg-amber-100 flex items-center justify-center text-amber-600 text-lg">©️</span>
                            Hak Kekayaan Intelektual
                        </h2>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Seluruh konten yang terdapat dalam website ini, termasuk namun tidak terbatas pada teks, grafik, logo, ikon, gambar, klip audio, unduhan digital, dan kompilasi data, adalah milik <strong>Pemerintah Desa {{ config('app.village_name') }}</strong> atau penyedia kontennya dan dilindungi oleh undang-undang hak cipta Indonesia.
                        </p>
                        <div class="bg-amber-50 border-l-4 border-amber-400 p-4 rounded-r-lg">
                            <p class="text-sm text-amber-800">
                                Anda diperbolehkan mengunduh atau mencetak materi dari website ini untuk penggunaan pribadi dan non-komersial, dengan syarat tidak mengubah atau menghapus pemberitahuan hak cipta atau kepemilikan lainnya.
                            </p>
                        </div>
                    </div>

                    <hr class="border-gray-100 my-10">

                    <div id="tanggung-jawab" class="mb-12 scroll-mt-28">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                            <span class="w-8 h-8 rounded-lg bg-rose-100 flex items-center justify-center text-rose-600 text-lg">🛡️</span>
                            Batasan Tanggung Jawab
                        </h2>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Meskipun kami berupaya keras untuk memastikan keakuratan informasi di website ini, Pemerintah Desa tidak bertanggung jawab atas:
                        </p>
                        <ul class="list-disc pl-5 space-y-2 text-gray-600 marker:text-emerald-500">
                            <li>Kesalahan atau ketidakakuratan konten yang tidak disengaja.</li>
                            <li>Kerugian langsung maupun tidak langsung yang timbul akibat penggunaan website ini.</li>
                            <li>Gangguan teknis sementara yang menyebabkan website tidak dapat diakses.</li>
                            <li>Isi dari website pihak ketiga yang mungkin tertaut dari website desa ini.</li>
                        </ul>
                    </div>

                    <hr class="border-gray-100 my-10">

                    <div id="perubahan" class="scroll-mt-28">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                            <span class="w-8 h-8 rounded-lg bg-purple-100 flex items-center justify-center text-purple-600 text-lg">🔄</span>
                            Perubahan Ketentuan
                        </h2>
                        <p class="text-gray-600 leading-relaxed">
                            Pemerintah Desa berhak untuk mengubah, memodifikasi, menambah, atau menghapus bagian dari Syarat dan Ketentuan ini sewaktu-waktu tanpa pemberitahuan sebelumnya. Perubahan akan berlaku efektif segera setelah diposting di halaman ini. Kami menyarankan Anda untuk memeriksa halaman ini secara berkala.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<style>
    html {
        scroll-behavior: smooth;
    }
    .scroll-mt-28 {
        scroll-margin-top: 7rem;
    }
</style>

@endsection