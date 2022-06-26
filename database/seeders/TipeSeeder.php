<?php

namespace Database\Seeders;

use App\Models\TipeKendaraan;
use Illuminate\Database\Seeder;

class TipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipeKendaraan::create([
            "nama_tipe" => "AEV CL",
            "merk_kendaraan_id" => 1
        ]);

        TipeKendaraan::create([
            "nama_tipe" => "AEV CP",
            "merk_kendaraan_id" => 1
        ]);

        TipeKendaraan::create([
            "nama_tipe" => "ST 150",
            "merk_kendaraan_id" => 2
        ]);
    }
}
