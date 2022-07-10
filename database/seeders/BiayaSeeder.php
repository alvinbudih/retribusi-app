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
            "kode" => "5100-00-010",
            "item" => "Biaya Uji Kend. Besar",
            "jenis" => "Regular",
            "kategori" => "Biaya",
            "param" => true,
            "jumlah" => 50000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "5100-00-020",
            "item" => "Biaya Uji Kend. Kecil",
            "jenis" => "Regular",
            "kategori" => "Biaya",
            "param" => true,
            "jumlah" => 40000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "5100-00-030",
            "item" => "Biaya Uji Kend. Besar Baru",
            "jenis" => "Regular",
            "kategori" => "Biaya",
            "param" => true,
            "jumlah" => 100000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "5100-00-040",
            "item" => "Biaya Uji Kend. Kecil Baru",
            "jenis" => "Regular",
            "kategori" => "Biaya",
            "param" => true,
            "jumlah" => 75000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "5200-00-010",
            "item" => "Kartu Uji",
            "jenis" => "Lain - Lain",
            "kategori" => "Biaya",
            "param" => false,
            "jumlah" => 20000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "5200-00-020",
            "item" => "Buku Uji Emisi",
            "jenis" => "Lain - Lain",
            "kategori" => "Biaya",
            "param" => false,
            "jumlah" => 20000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "5200-00-030",
            "item" => "Sertifikat Uji",
            "jenis" => "Lain - Lain",
            "kategori" => "Biaya",
            "param" => true,
            "jumlah" => 15000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "5200-00-040",
            "item" => "Stiker Hologram",
            "jenis" => "Lain - Lain",
            "kategori" => "Biaya",
            "param" => true,
            "jumlah" => 15000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "5100-00-050",
            "item" => "Pembubuhan Nomor Uji",
            "jenis" => "Regular",
            "kategori" => "Biaya",
            "param" => true,
            "jumlah" => 25000,
            "persen" => 0
        ]);
    }
}
