<?php

namespace Database\Seeders;

use App\Models\Biaya;
use Illuminate\Database\Seeder;

class BiayaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Biaya::create([
            "kode" => "101",
            "item" => "Kas",
            "jenis" => "Regular",
            "kategori" => "Biaya",
            "param" => false,
            "jumlah" => 0,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "001",
            "item" => "Biaya Uji",
            "jenis" => "Regular",
            "kategori" => "Biaya",
            "param" => true,
            "jumlah" => 0,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "002",
            "item" => "Kartu Uji",
            "jenis" => "Lain - Lain",
            "kategori" => "Biaya",
            "param" => false,
            "jumlah" => 20000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "003",
            "item" => "Buku Uji Emisi",
            "jenis" => "Lain - Lain",
            "kategori" => "Biaya",
            "param" => false,
            "jumlah" => 20000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "004",
            "item" => "Sertifikat Uji",
            "jenis" => "Regular",
            "kategori" => "Biaya",
            "param" => true,
            "jumlah" => 15000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "005",
            "item" => "Stiker Hologram",
            "jenis" => "Regular",
            "kategori" => "Biaya",
            "param" => true,
            "jumlah" => 15000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "006",
            "item" => "Pembubuhan Nomor Uji",
            "jenis" => "Regular",
            "kategori" => "Biaya",
            "param" => true,
            "jumlah" => 0,
            "persen" => 0
        ]);
    }
}
