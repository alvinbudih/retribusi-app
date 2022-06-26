<?php

namespace Database\Seeders;

use App\Models\JenisKendaraan;
use Illuminate\Database\Seeder;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisKendaraan::create([
            "nama_jenis" => "PICK UP",
            "konversi_jenis" => "MOBIL BARANG BAK TERBUKA"
        ]);
    }
}
