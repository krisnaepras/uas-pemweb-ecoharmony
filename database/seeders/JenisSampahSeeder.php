<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JenisSampah;


class JenisSampahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data jenis sampah dan nilai poin
        $jenisSampah = [
            ['jenis_sampah' => 'Kertas', 'poin_sampah' => 0.5],
            ['jenis_sampah' => 'Plastik', 'poin_sampah' => 0.3],
            ['jenis_sampah' => 'Logam', 'poin_sampah' => 0.8],
            // Tambahkan data jenis sampah lainnya sesuai kebutuhan
        ];

        // Masukkan data ke dalam tabel 'jenis_sampah'
        foreach ($jenisSampah as $sampah) {
            JenisSampah::create($sampah);
        }
    }
}
