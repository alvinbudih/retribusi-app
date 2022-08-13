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
        // biaya reguler
        Biaya::create([
            "kode" => "4100",
            "item" => "Biaya Uji Kend. Besar",
            "jenis" => "Reguler",
            "kategori" => "Pendapatan",
            "jumlah" => 50000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "4101",
            "item" => "Biaya Uji Kend. Kecil",
            "jenis" => "Reguler",
            "kategori" => "Pendapatan",
            "jumlah" => 40000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "4102",
            "item" => "Biaya Uji Kend. Besar Baru",
            "jenis" => "Reguler",
            "kategori" => "Pendapatan",
            "jumlah" => 100000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "4103",
            "item" => "Biaya Uji Kend. Kecil Baru",
            "jenis" => "Reguler",
            "kategori" => "Pendapatan",
            "jumlah" => 75000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "4104",
            "item" => "Sertifikat Uji",
            "jenis" => "Reguler",
            "kategori" => "Pendapatan",
            "jumlah" => 15000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "4105",
            "item" => "Stiker Hologram",
            "jenis" => "Reguler",
            "kategori" => "Pendapatan",
            "jumlah" => 15000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "4106",
            "item" => "Pembubuhan Nomor Uji",
            "jenis" => "Reguler",
            "kategori" => "Pendapatan",
            "jumlah" => 25000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "4107",
            "item" => "Uji Emisi",
            "jenis" => "Reguler",
            "kategori" => "Pendapatan",
            "jumlah" => 20000,
            "persen" => 0,
        ]);

        // biaya lain-lain
        Biaya::create([
            "kode" => "4108",
            "item" => "Kartu Uji",
            "jenis" => "Lain - Lain",
            "kategori" => "Pendapatan",
            "jumlah" => 20000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "4109",
            "item" => "Buku Uji Emisi",
            "jenis" => "Lain - Lain",
            "kategori" => "Pendapatan",
            "jumlah" => 20000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "4110",
            "item" => "Kartu Uji Rusak",
            "jenis" => "Lain - Lain",
            "kategori" => "Pendapatan",
            "jumlah" => 50000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "4111",
            "item" => "Kartu Uji Hilang / Tidak Sah",
            "jenis" => "Lain - Lain",
            "kategori" => "Pendapatan",
            "jumlah" => 100000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "4112",
            "item" => "Plat, Kawat dan Segel Rusak",
            "jenis" => "Lain - Lain",
            "kategori" => "Pendapatan",
            "jumlah" => 25000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "4113",
            "item" => "Plat, Kawat dan Segel Hilang / Tidak Sah",
            "jenis" => "Lain - Lain",
            "kategori" => "Pendapatan",
            "jumlah" => 25000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "4114",
            "item" => "Tanda Samping dan/atau Stiker Rusak, Hilang, Tidak Sah",
            "jenis" => "Lain - Lain",
            "kategori" => "Pendapatan",
            "jumlah" => 25000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "4115",
            "item" => "1 Paket Kehilangan TBLU",
            "jenis" => "Lain - Lain",
            "kategori" => "Pendapatan",
            "jumlah" => 150000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "4116",
            "item" => "Buku Rusak (Buku Uji, Stiker, Uji Emisi)",
            "jenis" => "Lain - Lain",
            "kategori" => "Pendapatan",
            "jumlah" => 50000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "4117",
            "item" => "Sertifikat Uji Hilang",
            "jenis" => "Lain - Lain",
            "kategori" => "Pendapatan",
            "jumlah" => 25000,
            "persen" => 0
        ]);

        // Denda
        Biaya::create([
            "kode" => "4118",
            "item" => "Denda Kend. Besar",
            "jenis" => "Lain - Lain",
            "kategori" => "Pendapatan",
            "jumlah" => 50000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "4119",
            "item" => "Denda Kend. Kecil",
            "jenis" => "Lain - Lain",
            "kategori" => "Pendapatan",
            "jumlah" => 40000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "4120",
            "item" => "Denda Retribusi Kend. Besar",
            "jenis" => "Reguler",
            "kategori" => "Pendapatan",
            "jumlah" => 50000,
            "persen" => 0.02
        ]);

        Biaya::create([
            "kode" => "4121",
            "item" => "Denda Retribusi Kend. Kecil",
            "jenis" => "Reguler",
            "kategori" => "Pendapatan",
            "jumlah" => 40000,
            "persen" => 0.02
        ]);
    }
}
