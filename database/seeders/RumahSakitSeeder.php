<?php

namespace Database\Seeders;

use App\Models\RumahSakit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RumahSakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_rumah_sakit' => 'Rumah Sakit Santosa',
                'alamat' => 'Jl. Kebonjati',
                'email' => 'santosa@mail.com',
                'telepon' => '088888888',
            ],
            [
                'nama_rumah_sakit' => 'RS Cahya Kawaluyaan',
                'alamat' => 'Jl. Kota Baru',
                'email' => 'kawaluyaan@mail.com',
                'telepon' => '0777777777',
            ],
            [
                'nama_rumah_sakit' => 'Rumah Sakit Mitra Kasih',
                'alamat' => 'Jl. Cibabat',
                'email' => 'mitrakasih@mail.com',
                'telepon' => '06666666666',
            ],
            [
                'nama_rumah_sakit' => 'RS Kasih Bunda',
                'alamat' => 'Jl. Cimindi',
                'email' => 'kasihbunda@mail.com',
                'telepon' => '055555555555',
            ],
            [
                'nama_rumah_sakit' => 'RSUP Hasan Sadikin',
                'alamat' => 'Jl. Pasteur',
                'email' => 'hasansadikin@mail.com',
                'telepon' => '044444444444',
            ],
        ];

        foreach ($data as $value) {
            RumahSakit::create([
                'nama_rumah_sakit' => $value['nama_rumah_sakit'],
                'alamat' => $value['alamat'],
                'email' => $value['email'],
                'telepon' => $value['telepon'],
            ]);
        }
    }
}