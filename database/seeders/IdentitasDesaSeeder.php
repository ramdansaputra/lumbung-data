<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IdentitasDesa;

class IdentitasDesaSeeder extends Seeder {
    public function run(): void {
        IdentitasDesa::create([
            'nama_desa'       => 'Desa Contoh',
            'kode_desa'       => '0001',
            'kode_pos'        => '12345',

            'kecamatan'       => 'Kecamatan Contoh',
            'kabupaten'       => 'Kabupaten Contoh',
            'provinsi'        => 'Jawa Barat',

            'alamat_kantor'   => 'Jl. Raya Desa No. 1',
            'email_desa'      => 'desa@contoh.id',
            'telepon_desa'    => '021123456',
            'website_desa'    => 'https://desacontoh.id',

            'kepala_desa'     => 'Kepala Desa Contoh',
            'nip_kepala_desa' => '197001011990011001',

            'latitude'        => -6.2000000,
            'longitude'       => 106.8166667,
            'link_peta'       => 'https://maps.google.com',
        ]);
    }
}
