<?php

namespace App\Imports;

use App\Models\Penduduk;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PendudukImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Penduduk([
            'nik' => $row['nik'],
            'nama' => $row['nama'],
            'keluarga_id' => $row['keluarga_id'] ?? null,
            'wilayah_id' => $row['wilayah_id'] ?? null,
            'jenis_kelamin' => $row['jenis_kelamin'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => $row['tanggal_lahir'],
            'golongan_darah' => $row['golongan_darah'] ?? null,
            'agama' => $row['agama'],
            'pendidikan' => $row['pendidikan'] ?? null,
            'pekerjaan' => $row['pekerjaan'],
            'status_kawin' => $row['status_kawin'],
            'status_hidup' => $row['status_hidup'] ?? 'hidup',
            'kewarganegaraan' => $row['kewarganegaraan'] ?? 'WNI',
            'no_telp' => $row['no_telp'] ?? null,
            'email' => $row['email'] ?? null,
            'alamat' => $row['alamat'] ?? null,
        ]);
    }
}
