<?php

namespace Database\Seeders;

use App\Models\MerkKendaraan;
use Illuminate\Database\Seeder;

class MerkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MerkKendaraan::create([
            "nama_merk" => "Suzuki"
        ]);

        MerkKendaraan::create([
            "nama_merk" => "Isuzu"
        ]);
    }
}
